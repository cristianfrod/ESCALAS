<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule_database extends CI_Model {

  // function selectNickname($idPermission){
  //
  //   $result = $this->db
  //     ->select('nickname')
  //     ->where('idPermission', $idPermission)
  //     ->order_by('nickname', 'asc')
  //     ->get('users')
  //     ->result();
  //   return $result;
  // }

  function checkOldEntries($startDate,$endDate){
    $result = $this->db
      ->where("`entryDate` between '". $startDate ."' and '". $endDate."'")
      // ->where('date <=' ,$endDate)
      ->get("memberentries");
      // echo $this->db->last_query(); die;
      return $result;
  }

  function newGroupEntry($entry){
    $result = $this->db
      ->insert('groupentries', $entry);
    return $result;
  }

  function getGroupsEntries($year,$month){
    $result = $this->db
      ->select('groups.groupName, groupentries.IdGroup, groupentries.idSchedule, groupentries.scheduleDate')
      ->from('groups')
      ->where('month(scheduleDate)', $month)
      ->where('year(scheduleDate)', $year)
      ->join('groupentries','groups.idGroup = groupentries.IdGroup')
      ->order_by('groupentries.scheduleDate', 'groupentries.idSchedule')
      ->get();
      //  echo $this->db->last_query(); die;
    return $result;
  }

  function getMembersEntries($year,$month){
    $result = $this->db
      ->select('users.nickname, users.idUser, memberentries.idSchedule, memberentries.scheduleDate')
      ->from('memberentries')
      ->where('month(scheduleDate)', $month)
      ->where('year(scheduleDate)', $year)
      ->join('users','users.idUser = memberentries.IdUser')
      ->order_by('scheduleDate')
      ->order_by('idSchedule')
      ->order_by('nickname')
      ->get();
      //  echo $this->db->last_query(); die;
    return $result;
  }

  function getExchangeEntries($year,$month){
    $result = $this->db
      ->select('users.nickname, users.idUser, exchangentries.idSchedule, exchangentries.scheduleDate, exchangentries.exchangeSet')
      ->from('exchangentries')
      ->where('month(scheduleDate)', $month)
      ->where('year(scheduleDate)', $year)
      ->join('users','users.idUser = exchangentries.IdUser')
      ->order_by('scheduleDate')
      ->order_by('idSchedule')
      ->order_by('nickname')
      ->get();
    return $result;
  }

  function checkSchedules($idUser,$idSchedule,$scheduledate){
    $result = $this->db
      ->where(array('idUser' => $idUser, 'idSchedule' => $idSchedule, 'scheduleDate' => $scheduledate))
      ->get('exchangentries');
    return $result;
  }

  function newEntry($entry){
    $result = $this->db
      ->insert('memberentries', $entry);
    $result = $this->db
      ->insert('exchangentries', $entry);
      // echo $this->db->last_query(); die;
    return $result;
  }

  function memberDeleteEntry($deletion){

    if ($deletion['startDate'] != $deletion['endDate'] ) {
      $type = 'range';
      $result = $this->db
        ->where('idUser', $deletion['idUser'])
        ->where('scheduleDate >=', $deletion['startDate'])
        ->where('scheduleDate <=', $deletion['endDate'])
        ->get('exchangentries');
    }elseif ($deletion['idSchedule'] > 0 && $deletion['idSchedule'] < 5) {
      $type = 'schedule';
      $result = $this->db
        ->where('idUser', $deletion['idUser'])
        ->where('scheduleDate >=', $deletion['startDate'])
        ->where('scheduleDate <=', $deletion['endDate'])
        ->where('idSchedule =', $deletion['idSchedule'])
        ->get('exchangentries');
    }else {
      $type = 'date';
      $result = $this->db
        ->where('idUser', $deletion['idUser'])
        ->where('scheduleDate >=', $deletion['startDate'])
        ->where('scheduleDate <=', $deletion['endDate'])
        ->get('exchangentries');
    }

    if ($result->num_rows() > 0){
      //delete from exchangentries
      if ($type === 'schedule') {
        $result = $this->db
          ->where('idUser', $deletion['idUser'])
          ->where('scheduleDate >=', $deletion['startDate'])
          ->where('scheduleDate <=', $deletion['endDate'])
          ->where('idSchedule =', $deletion['idSchedule'])
          ->delete('exchangentries');
      }else {
        $result = $this->db
        ->where('idUser', $deletion['idUser'])
        ->where('scheduleDate >=', $deletion['startDate'])
        ->where('scheduleDate <=', $deletion['endDate'])
        ->delete('exchangentries');
      }
      // print_r($this->db->last_query()); die;
      //insert deletion record
      $result = $this->db
       ->insert('memberdeletionentry', $deletion);
      return true;
    }else{
      return false;
    }
  }

  function newExchange($exchanges){

    //update table exchangentries 'exchangeSet' => '1' means there is an exchange
    $this->db
      ->set('idUser', $exchanges['idOccupier'])
      ->set('exchangeSet', '1')
      ->where(array('idUser' => $exchanges['idOwner'], 'scheduleDate' => $exchanges['scheduleDateOwner'], 'idSchedule' => $exchanges['idScheduleOwner']))
      ->update('exchangentries');
      //echo $this->db->last_query(); die;

    if ($exchanges['idScheduleOccupier'] != 0) {
      $this->db
        ->set('idUser', $exchanges['idOwner'])
        ->set('exchangeSet', '1')
        ->where(array('idUser' => $exchanges['idOccupier'], 'scheduleDate' => $exchanges['scheduleDateOccupier'], 'idSchedule' => $exchanges['idScheduleOccupier']))
        ->update('exchangentries');
    }

    $result = $this->db
      ->insert('exchanges', $exchanges);
      return $result;
  }

  function getGroups() {
    $this->db->order_by("groupName", "asc");
    $result = $this->db->get("groups");
    return $result;
  }

  function addGroup($groupName){
    $result = $this->db
      ->insert('groups', array('groupName' => $groupName));
    return $result;

  }

  function checkGroup($groupName){
    $result = $this->db
      ->where('groupName' , $groupName)
      ->select('groups');
    return $result;
  }

  function deleteGroup($idGroup) {
    $result = $this->db
      ->where('idGroup', $idGroup)
      ->delete('groups');
    return $result;
  }

  function getScheduleMembers(){

    $date = $this->input->post("date");
    $schedule = $this->input->post("schedule");

    $result = $this->db
      ->select('users.nickname, users.idUser')
      ->from('users')
      ->where(array('scheduleDate' => $date, 'idSchedule' => $schedule))
      ->join('exchangentries','users.idUser = exchangentries.IdUser')
      ->order_by('nickname')
      ->get();

        // echo $this->db->last_query(); die;
    return $result;
  }

  function getGroupMembers($idGroup = null) {
    // echo "porra"; die();
    //if it comes from js function then get the value from post
    if ($idGroup == null) {
        $idGroup = $this->input->post("idGroup");
    }

    $result = $this->db
      ->where("idGroup", $idGroup)
      ->order_by("username", "asc")
      ->get("users");
      return $result;
  }

  function getAllUsers() {

    $result = $this->db
      ->select('idUser,nickname')
      ->where('idPermission', 1)
      ->order_by("nickname", "asc")
      ->get("users");
      return $result;
  }

  function getReportUsers() {

    $result = $this->db
      ->where('idGroup<>', null)
      ->order_by("nickname", "asc")
      ->get("users");
      return $result;
  }


  function getUsers() {

    $result = $this->db
      ->where("idGroup", null)
      ->order_by("nickname", "asc")
      ->get("users");
      return $result;
  }

  function addMember(){
    $idUser = $this->input->post("idUser");
    $idGroup = $this->input->post("idGroup");
    $result = $this->db
      ->set("idGroup", $idGroup)
      ->where("idUser", $idUser)
      ->update("users");
    return $result;
  }

  function removeMember($idUser = null){
    //if it comes from js function then get the value from post
    if ($idUser == null) {
      $idUser = $this->input->post("idUser");
    }

    $result = $this->db
      ->set("idGroup", null)
      ->where("idUser", $idUser)
      ->update("users");
    return $result;
  }
}
