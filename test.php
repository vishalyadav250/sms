<?php
session_start();
if( isset($_POST['fetchSectionRecords']) && isset($_SESSION['loginId']) )
{
   include_once './../db/index.php';
   $className   =   $_POST['fetchSectionRecords'];
   $errorArray = array();

   if($className == "" || $className == " " || strlen($className) > 50 )
    {
       $errorArray['invalid'] = "Error Data Doesn't Exist";
       echo json_encode($errorArray);
       return;
    }
    else {
      $sql = "SELECT section FROM SCHOOL_CLASS_SECTION WHERE class = '$className' ";
      $result = $conn->query($sql);

       if($result)
       {
          if ($result->num_rows > 0)
          {
              while($row = $result->fetch_assoc())
              {
                 $errorArray[] = $row;
              }
              echo json_encode($errorArray);
              return;
          }
       }
       $conn->close();
    }
}
else if(isset($_POST['admissionNo']) && isset($_POST['class']) && isset($_POST['section']) && isset($_POST['rollNo']) && isset($_POST['studentName']) && isset($_POST['dob']) && isset($_POST['bloodGroup']) && isset($_POST['dateOfAdmission']) && isset($_POST['tookAdmissionIn']) && isset($_POST['motherName']) && isset($_POST['fatherName']) &&isset($_POST['guardianName'])
 && isset($_POST['emailId']) && isset($_POST['parentsContactNo']) && isset($_POST['alternativeContactNo']) && isset($_POST['transportationMode']) && isset($_POST['permanentAddress']) &&isset($_FILES['studentPofilePicture']))
{
  $admissionNo  =   $_POST['admissionNo'];
  $class        =   $_POST['class'];
  $section      =   $_POST['section'];
  $rollNo       =   $_POST['rollNo'];
  $studentName  =   $_POST['studentName'];
  $dob          =   $_POST['dob'];
  $bloodGroup   =   $_POST['bloodGroup'];
  $dateOfAdmission =  $_POST['dateOfAdmission'];
  $tookAdmissionIn  =  $_POST['tookAdmissionIn'];
  $motherName   =  $_POST['motherName'];
  $fatherName   =   $_POST['fatherName'];
  $guardianName  =  $_POST['guardianName'];
  $emailId      =   $_POST['emailId'];
  $parentsContactNo =  $_POST['parentsContactNo'];
  $alternativeContactNo  =  $_POST['alternativeContactNo'];
  $transportationMode =  $_POST['transportationMode'];
  $permanentAddress =  $_POST['permanentAddress'];
  $studentPofilePicture =  $_FILES['studentPofilePicture'];

  validateUser($admissionNo,$class,$section,$rollNo,$studentName,$dob,$bloodGroup,$dateOfAdmission,$tookAdmissionIn,$motherName,$fatherName,$guardianName,$emailId,$parentsContactNo,$alternativeContactNo,$transportationMode,$permanentAddress,$studentPofilePicture);
}
else {
  header('Location : ./../404.php');
}

function validateUser($admissionNo,$class,$section,$rollNo,$studentName,$dob,$bloodGroup,$dateOfAdmission,$tookAdmissionIn,$motherName,$fatherName,$guardianName,$emailId,$parentsContactNo,$alternativeContactNo,$transportationMode,$permanentAddress,$studentPofilePicture)
{
  $error[]  = array();
  if(!strcmp($admissionNo, ""))
  {
      $error["admissionNo"] = "Admission No is required." ;
  }
  else if(strlen($admissionNo) > 10)
  {
      $error["admissionNo"] = "Admission No can't be more than 10 characters." ;
  }

  if(!strcmp($class, ""))
  {
      $error["class"] = "Class is required." ;
  }
  else if(strlen($class) > 50)
  {
      $error["class"] = "Class name can't be more than 50 characters." ;
  }

  if(!strcmp($section, ""))
  {
      $error["section"] = "Section is required." ;
  }
  else if(strlen($section) > 20)
  {
      $error["section"] = "Section name can't be more than 20 characters." ;
  }

  if(!strcmp($rollNo, ""))
  {
      $error["rollNo"] = "Roll No is required." ;
  }
  else if(strlen($rollNo) > 50)
  {
      $error["rollNo"] = "Roll No can't be more than 50 characters." ;
  }

  if(!strcmp($studentName, ""))
  {
      $error["studentName"] = "Student name is required." ;
  }
  else if(strlen($studentName) > 50)
  {
      $error["studentName"] = "Student name can't be more than 50 characters." ;
  }

  if(!strcmp($dob, ""))
  {
      $error["dob"] = "Date of birth is required." ;
  }
  else if(strlen($dob) > 20)
  {
      $error["dob"] = "Date of birth can't be in more than 15 characters." ;
  }

    $format = 'Y-m-d';
    $currentDate = date($format);
    $dateConversion = DateTime::createFromFormat($format, $dob);
    $formDate = $dateConversion->format($format);
    if($currentDate < $formDate )
    {
      $error['dob'] = 'Date of Birth is Invalid.';
    }

  if(!strcmp($bloodGroup, ""))
  {
      $error["bloodGroup"] = "Blood group is required." ;
  }
  else if(strlen($bloodGroup) > 50)
  {
      $error["bloodGroup"] = "Blood group can't be more than 50 characters." ;
  }

  if(!strcmp($dateOfAdmission, ""))
  {
      $error["dateOfAdmission"] = "Date of admission is required." ;
  }
  else if(strlen($dateOfAdmission) > 50)
  {
      $error["dateOfAdmission"] = "Date of admission can't be in more than 50 characters." ;
  }

    $format = 'Y-m-d';
    $currentDate = date($format);
    $dateConversion = DateTime::createFromFormat($format, $dateOfAdmission);
    $formDate = $dateConversion->format($format);
    if($currentDate < $formDate )
    {
      $error['dateOfAdmission'] = 'Date of Admission is Invalid.';
    }

  if(!strcmp($tookAdmissionIn, ""))
  {
      $error["tookAdmissionIn"] = "Class of admission is required." ;
  }
  else if(strlen($tookAdmissionIn) > 50)
  {
      $error["tookAdmissionIn"] = "Class of admission can't be more than 15 characters." ;
  }

  if(!strcmp($motherName, ""))
  {
      $error["motherName"] = "Mother name is required." ;
  }
  else if(strlen($motherName) > 50)
  {
      $error["motherName"] = "Mother name can't be more than 50 characters." ;
  }

  if(!strcmp($fatherName, ""))
  {
      $error["fatherName"] = "Father name is required." ;
  }
  else if(strlen($fatherName) > 50)
  {
      $error["fatherName"] = "Father name can't be more than 50 characters." ;
  }

  if(!strcmp($guardianName, ""))
  {
      $error["guardianName"] = "Guardian name is required." ;
  }
  else if(strlen($guardianName) > 50)
  {
      $error["guardianName"] = "Guardian name can't be more than 50 characters." ;
  }

  if(!strcmp($emailId, ""))
  {
      $error["emailId"] = "Email id is required." ;
  }
  else if(strlen($emailId) > 100)
  {
      $error["emailId"] = "Route No can't be more than 100 characters." ;
  }
  else if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$emailId))
  {
    $error["emailId"] = "Email id is invalid." ;
  }


  if(!strcmp($parentsContactNo, ""))
  {
      $error["parentsContactNo"] = "Parents contact No is required." ;
  }
  else if(strlen($parentsContactNo) > 10)
  {
      $error["parentsContactNo"] = "Parents contact No can't be more than 10 characters." ;
  }
  else if (!preg_match('/^[0-9]{10}$/',$parentsContactNo ))
  {
    $error["parentsContactNo"] = "Parents contact No is invalid." ;
  }

  if(!strcmp($alternativeContactNo, ""))
  {
      $error["alternativeContactNo"] = "Alternative contact no is required." ;
  }
  else if(strlen($alternativeContactNo) > 10)
  {
      $error["alternativeContactNo"] = "Alternative contact no can't be more than 10 characters." ;
  }
  else if (!preg_match('/^[0-9]{10}$/',$alternativeContactNo))
  {
    $error["alternativeContactNo"] = "Alternative contact No is invalid." ;
  }

  if(!strcmp($transportationMode, ""))
  {
      $error["transportationMode"] = "Transportation mode is required." ;
  }
  else if(strlen($transportationMode) > 50)
  {
      $error["transportationMode"] = "Transportation mode can't be more than 50 characters." ;
  }

  if(!strcmp($permanentAddress, ""))
  {
      $error["permanentAddress"] = "Permanent address is required." ;
  }
  else if(strlen($permanentAddress) > 200)
  {
      $error["permanentAddress"] = "Permanent address can't be more than 200 characters." ;
  }

}

?>
