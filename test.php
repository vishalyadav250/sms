<?php
session_start();
if(!isset($_SESSION['loginId']))
 {
   header('Location: ./../index.php');
   exit;
 }
 if( $_SESSION['type'] != 'admin' )
  {
    header('Location: ./../404.php');
    exit;
  }
else
{
  include './../defaultLayout/header.php';
?>


<form id="aboutSchoolSettings" action="add-student-credentials-controller.php"  method="POST" style="display:flex; flex-direction: column; justify-content:center; min-height:100vh;">

  <div class="container-fluid schoolSettingBody" >

     <div style="padding: 0px; margin-top: 20px;">
     <h6 class="schoolSettingHeading" style="background-color:dodgerblue;">Student Credentials</h6>
     <div class="schoolSettingFields row shadow justify-content-between" style="padding-bottom: 35px; padding-top: 20px; border:1px solid dodgerblue; border-radius: 0px; border-top: 0px ; margin-top: 0px;  ">

<div class="col-md-12 mt-2">
  <div class="text-right">
    <button type="button" class="btn btn-success" name="button" data-toggle="modal" data-target="#student_credentials_export">Export Credentials</button>
  </div>
</div>

      <div class="col-lg-6 row mt-4">
        <div class="col-lg-4">
          <div class="form-group" style="padding:0px;">
            <label>Admission No:<span style="color:red;">*</span></label>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="form-group">
            <textarea rows="1" class="form-control" id="admissionNo" name="admissionNo" placeholder=""></textarea>
            <div class="error"></div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 row mt-4">
        <div class="col-lg-4">
          <div class="form-group" style="padding:0px;">
            <label>Class<span style="color:red;">*</span</label>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="form-group">
            <select class="form-control" name="class" id="class" >
                <option>LKG</option>
                <option>UKG</option>
                <option>Class I</option>
                <option>Class II</option>
                <option>Class III</option>
                <option>Class IV</option>
                <option>Class V</option>
                <option>Class VI</option>
                <option>Class VII</option>
                <option>Class VIII</option>
                <option>Class IX</option>
                <option selected="selected">Class X</option>
                <option>Class XI</option>
                <option>Class XII</option>
              </select>
            <div class="error"></div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 row mt-4">
        <div class="col-lg-4">
          <label >Class Section <span style="color:red;">*</span</label>
        </div>
        <div class="col-lg-8">
          <div class="form-group">
            <select class="form-control" name="section" id="section" >
                <option>A</option>
                <option selected="selected">B</option>
                <option>C</option>
                <option >D</option>
                <option>E</option>
                <option>F</option>
              </select>
           </div>
        </div>
      </div>

      <div class="col-lg-6 row mt-4">
        <div class="col-lg-4">
          <div class="form-group" style="padding:0px;">
            <label>Roll No:<span style="color:red;">*</span></label>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="form-group">
            <textarea rows="1" class="form-control" id="rollNo" name="rollNo" placeholder=""></textarea>
            <div class="error"></div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 row mt-4">
        <div class="col-lg-4">
          <div class="form-group" style="padding:0px;">
            <label>Student Name:<span style="color:red;">*</span></label>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="form-group">
            <textarea rows="1" class="form-control" id="studentName" name="studentName" placeholder=""></textarea>
            <div class="error"></div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 row mt-4">
        <div class="col-lg-4">
          <div class="form-group" style="padding:0px;">
            <label>Date Of Birth<span style="color:red;">*</span></label>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="form-group">
            <input type="date" class="form-control" name="dob" id="dob">
            <div class="error"></div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 row mt-4">
        <div class="col-lg-4">
          <div class="form-group" style="padding:0px;">
            <label>Blood Group:<span style="color:red;">*</span></label>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="form-group">
            <select class="form-control" name="bloodGroup" id="bloodGroup">
              <option>A+</option>
              <option>A-</option>
              <option selected="selected">B+</option>
              <option>B-</option>
              <option>AB+</option>
              <option>AB-</option>
              <option>O+-</option>
              <option>O-</option>
            </select>
            <div class="error"></div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 row mt-4">
        <div class="col-lg-4">
          <div class="form-group" style="padding:0px;">
            <label>Date Of Admission<span style="color:red;">*</span></label>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="form-group">
            <input type="date" class="form-control" name="dateOfAdmission" id="dateOfAdmission">
            <div class="error"></div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 row mt-4">
        <div class="col-lg-4">
          <div class="form-group" style="padding:0px;">
            <label>Blood Group:<span style="color:red;">*</span></label>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="form-group">
            <select class="form-control" name="tookAdmissionIn" id="tookAdmissionIn">
                <option>LKG</option>
                <option>UKG</option>
                <option>Class I</option>
                <option>Class II</option>
                <option>Class III</option>
                <option>Class IV</option>
                <option>Class V</option>
                <option>Class VI</option>
                <option>Class VII</option>
                <option>Class VIII</option>
                <option>Class IX</option>
                <option>Class X</option>
                <option>Class XI</option>
                <option>Class XII</option>
              </select>
            <div class="error"></div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 row mt-4">
        <div class="col-lg-4">
          <div class="form-group" style="padding:0px;">
            <label>Mother Name<span style="color:red;">*</span></label>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="form-group">
            <textarea rows="1" class="form-control" id="motherName" name="motherName" placeholder=""></textarea>
            <div class="error"></div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 row mt-4">
        <div class="col-lg-4">
          <div class="form-group" style="padding:0px;">
            <label>Father Name<span style="color:red;">*</span></label>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="form-group">
            <textarea rows="1" class="form-control" id="fatherName" name="fatherName" placeholder=""></textarea>
            <div class="error"></div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 row mt-4">
        <div class="col-lg-4">
          <div class="form-group" style="padding:0px;">
            <label>Guardian Name<span style="color:red;">*</span></label>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="form-group">
            <textarea rows="1" class="form-control" id="guardianName" name="guardianName" placeholder=""></textarea>
            <div class="error"></div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 row mt-4">
        <div class="col-lg-4">
          <div class="form-group" style="padding:0px;">
            <label>Email ID<span style="color:red;">*</span></label>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="form-group">
            <textarea rows="1" class="form-control" id="emailId" name="emailId" placeholder=""></textarea>
            <div class="error"></div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 row mt-4">
        <div class="col-lg-4">
          <div class="form-group" style="padding:0px;">
            <label>Parents Contact No<span style="color:red;">*</span></label>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="form-group">
            <textarea rows="1" class="form-control" id="parentsContactNo" name="parentsContactNo" placeholder=""></textarea>
            <div class="error"></div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 row mt-4">
        <div class="col-lg-4">
          <div class="form-group" style="padding:0px;">
            <label>Alternative Contact No<span style="color:red;">*</span></label>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="form-group">
            <textarea rows="1" class="form-control" id="alternativeContactNo" name="alternativeContactNo" placeholder=""></textarea>
            <div class="error"></div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 row mt-4">
        <div class="col-lg-4">
          <div class="form-group" style="padding:0px;">
            <label>Transportation Mode<span style="color:red;">*</span></label>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="form-group">
            <select class="form-control" name="transportationMode" id="transportationMode">
              <option>Private Vehicle</option>
              <option>School Van</option>
              <option selected="selected">School Bus</option>
              <option>Walking Distance</option>
            </select>
            <div class="error"></div>
          </div>
        </div>
      </div>

      <div class="ds col-lg-6 row mt-4" style="">
        <div class="col-lg-4">
          <div class="form-group">
            <label>Permanent Address:<span style="color:red;">*</span></label>
                <div class="error"></div>
          </div>
        </div>
        <div class="ds ds2 col-lg-8" style="">
          <div class="form-group">
            <textarea rows="5" class="form-control" id="permanentAddress" name="permanentAddress" placeholder="" ></textarea>
                <div class="error"></div>
          </div>
        </div>
      </div>



      <div class="col-lg-6 row mt-4">
        <div class="col-lg-4">
          <div class="form-group" style="padding:0px;">
            <label>Student Profile Picture<span style="color:red;">*</span></label>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="form-group">
             <div class="text-center displayImage" style="display: none; margin: 4px 0px;" >
                 <img src=""  alt="" style="max-width:100%; background-color: gray; border:1px solid gray;border-radius:8px; ">
             </div>
             <div class="custom-file">
                <input type="file" class="custom-file-input" name="studentProfilePicture" onchange="readImage(this);" id="studentProfilePicture" accept="image/png,image/jpg,image/jpeg">
                <label class="custom-file-label" >Choose file</label>
             </div>
             <span class="error"></span>
          </div>
        </div>
      </div>


      <div class="text-center" style="width: 100%; padding-top: 30px;">
        <input type="button" class="btn btn-success" onclick="validateSettings()"  style="padding:7px 35px;" value="Submit" >
      </div>

     </div>
    </div>

  </div>
</form>


  <!-- student_credentials_export_form  Modal -->
  <div class="modal fade" id="student_credentials_export" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="text-center">
            <h5 >Export Credentials File</h5>
          </div>
          <hr>
          <form id="student_credentials_export_form" class="mt-2" action="./backend_logic.php" method="POST" enctype="multipart/form-data">
             <div class="form-group">
               <label >Select File Type</label>
               <select class="form-control" name="file_type"  >
                   <option selected="selected">xlsx</option>
                 </select>
              </div>
              <div class="custom-file">
                 <label class="custom-file-label" >Choose file</label>
                 <input type="file" class="custom-file-input" name="dataFile" id="dataFile">
              </div>
              <div class="modal-footer">
                <input type="hidden" name="student_credentials_export" value="">
                <button type="submit" class="btn btn-primary">Upload</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>




  <script type="text/javascript">

        function readFile()
      {
          if (this.files && this.files[0])
          {
            var FR= new FileReader();
            FR.addEventListener("load", function(e)
            {

              document.getElementById("student_profile_data").value = e.target.result;
              document.getElementById("student_profile_img").style.display = "block";
              document.getElementById("student_profile_img").src = e.target.result;

              var validate_file = $('#student_profile_data').val();
              var validate = false;
              var substring_img = ['jpeg', 'jpg', 'png'];
               for (var i_type in substring_img)
                {
                  if(validate_file.includes(substring_img[i_type]))
                    validate = true;
                }

               if(document.getElementById('student_profile_data').value != "")
                {
                    if(!validate)
                      alert('Only Supports PNG,JPEG and JPG Image Formats');
                }

            });
            FR.readAsDataURL( this.files[0] );
          }
      }

    document.getElementById("student_profile_input").addEventListener("change", readFile);

  </script>

<?php
}
  include './../defaultLayout/footer.php';
?>
