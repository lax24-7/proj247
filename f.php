<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Add Student</title>
   
    <style>
        body{
            background-color: black;
        }
        /* Styles for form elements */
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #333;
            border-radius: 5px;
        }
        
        label {
            display: block;
            margin-bottom: 10px;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
            background-color: lightgray;
        }
        
        .img-container {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .my-image {
            display: block;
            margin: 0 auto;
            border-radius: 70px;
        }
        
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .btn-primary {
            background-color: green;
        }
        
        .btn-100 {
            width: 100%;
        }
        
        .panel {
            margin-top: 20px;
        }
        
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
           /* Sidebar styles */
           .sidebar {
            width: 220px;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            color: #fff;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .sidebar.sidebar-collapsed {
            width: 60px;
        }

        .sidebar h1 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .sidebar .menu-item {
            margin-bottom: 10px;
        }

        .sidebar .menu-item a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 10px;
            transition: all 0.3s ease;
        }

        .sidebar .menu-item a:hover {
            background-color: #555;
        }

        /* Dropdown styles */
        .dropdown {
            position: relative;
        }

        .dropdown .dropdown-btn {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 10px;
            transition: all 0.3s ease;
        }

        .dropdown .dropdown-btn:hover {
            background-color: #555;
        }

        .dropdown .dropdown-content {
            display: none;
            position: absolute;
            background-color: #555;
            min-width: 200px;
            padding: 10px;
            z-index: 1;
        }
        label{
            color: #fff;
        }

        .dropdown .dropdown-content a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 5px;
            transition: all 0.3s ease;
        }

        .dropdown .dropdown-content a:hover {
            background-color: #777;
        }

        .dropdown .show {
            display: block;
        }

        /* Content styles */
        .content {
            margin-left: 250px;
            padding: 20px;
        }

        /* Logout button */
        .logout-btn {
            margin-top: 20px;
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 10px;
            background-color: #c0392b;
            border-radius: 5px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #e74c3c;
        }
        .add-student-button {
  background-color: green; /* Set the background color */
  color: white; /* Set the text color */
  padding: 10px 20px; /* Add padding around the button */
  font-size: 16px; /* Set the font size */
  border: none; /* Remove the border */
  cursor: pointer; /* Add a pointer cursor on hover */
  border-radius: 4px; /* Add rounded corners */
  margin-left:37%;
}

.add-student-button:hover {
  background-color: #45a049; /* Change the background color on hover */
}
.sticky-video {
            position: fixed;
            top: 250px; /* Adjust the top position as needed */
            right: 19px; /* Adjust the left position as needed */
            width: 520px; /* Adjust the width as needed */
            height: auto;
            z-index: 9999; /* Ensure the video stays on top of other elements */
        }

        .sticky-video video {
            width: 100%;
        }
        h4 {
            color: #fff;
            background-color: #888;
            padding: 10px;
        }
        h2{
            text-a
            color: #fff;
            padding: 0px;
        }
    </style>
    <script src="jquery-1.8.2.js"></script>
    <script src="mfs100.js"></script>
    <script language="javascript" type="text/javascript">


        var quality = 60; //(1 to 100) (recommanded minimum 55)
        var timeout = 10; // seconds (minimum=10(recommanded), maximum=60, unlimited=0 )
		var nooffinger = '1';
        function GetInfo() {
            document.getElementById('tdSerial').innerHTML = "";
            document.getElementById('tdCertification').innerHTML = "";
            document.getElementById('tdMake').innerHTML = "";
            document.getElementById('tdModel').innerHTML = "";
            document.getElementById('tdWidth').innerHTML = "";
            document.getElementById('tdHeight').innerHTML = "";
            document.getElementById('tdLocalMac').innerHTML = "";
            document.getElementById('tdLocalIP').innerHTML = "";
            document.getElementById('tdSystemID').innerHTML = "";
            document.getElementById('tdPublicIP').innerHTML = "";


            var key = document.getElementById('txtKey').value;
            var res;
            if (key.length == 0) {
                res = GetMFS100Info();
            }
            else {
                //alert("GetMFS100KeyInfo");
                res = GetMFS100KeyInfo(key);
            }

            if (res.httpStaus) {

                document.getElementById('txtStatus').value = "ErrorCode: " + res.data.ErrorCode + " ErrorDescription: " + res.data.ErrorDescription;

                if (res.data.ErrorCode == "0") {
                    document.getElementById('tdSerial').innerHTML = res.data.DeviceInfo.SerialNo;
                    document.getElementById('tdCertification').innerHTML = res.data.DeviceInfo.Certificate;
                    document.getElementById('tdMake').innerHTML = res.data.DeviceInfo.Make;
                    document.getElementById('tdModel').innerHTML = res.data.DeviceInfo.Model;
                    document.getElementById('tdWidth').innerHTML = res.data.DeviceInfo.Width;
                    document.getElementById('tdHeight').innerHTML = res.data.DeviceInfo.Height;
                    document.getElementById('tdLocalMac').innerHTML = res.data.DeviceInfo.LocalMac;
                    document.getElementById('tdLocalIP').innerHTML = res.data.DeviceInfo.LocalIP;
                    document.getElementById('tdSystemID').innerHTML = res.data.DeviceInfo.SystemID;
                    document.getElementById('tdPublicIP').innerHTML = res.data.DeviceInfo.PublicIP;
                }
            }
            else {
                alert(res.err);
            }
            return false;
        }
		
		 //Devyang Multi Finger Capture
        function MultiFingerCapture() {
            try {
                  document.getElementById('txtStatus').value = "";
                document.getElementById('imgFinger').src = "data:image/bmp;base64,";
                document.getElementById('txtImageInfo').value = "";
                document.getElementById('txtIsoTemplate').value = "";
                document.getElementById('txtAnsiTemplate').value = "";
                document.getElementById('txtIsoImage').value = "";
                document.getElementById('txtRawData').value = "";
                document.getElementById('txtWsqData').value = "";

                nooffinger = document.getElementById('txtNoOfFinger').value;

                var res = CaptureMultiFinger(quality, timeout, nooffinger);
              
                if (res.httpStaus) {

                    document.getElementById('txtStatus').value = "ErrorCode: " + res.data.ErrorCode + " ErrorDescription: " + res.data.ErrorDescription;

                    if (res.data.ErrorCode == "0") {
                        //document.getElementById('imgFinger').src = "data:image/bmp;base64," + res.data.BitmapData;
                        //document.getElementById('txtQuality').value = res.data.Quality;
                        //document.getElementById('txtNFIQ').value = res.data.Nfiq;
                        document.getElementById('txtIsoTemplate').value = res.data.IsoTemplate;
                       // document.getElementById('txtAnsiTemplate').value = res.data.AnsiTemplate;
                        //document.getElementById('txtIsoImage').value = res.data.IsoImage;
                        //document.getElementById('txtRawData').value = res.data.RawData;
                        //document.getElementById('txtWsqData').value = res.data.WsqImage;
                    }
                }
                else {
                    alert(res.err);
                }
            }
            catch (e) {
                alert(e);
            }
            return false;
        }

        //

        function Capture() {
            try {
                document.getElementById('txtStatus').value = "";
                document.getElementById('imgFinger').src = "data:image/bmp;base64,";
                document.getElementById('txtImageInfo').value = "";
                document.getElementById('txtIsoTemplate').value = "";
                document.getElementById('txtAnsiTemplate').value = "";
                document.getElementById('txtIsoImage').value = "";
                document.getElementById('txtRawData').value = "";
                document.getElementById('txtWsqData').value = "";
                var res = CaptureFinger(quality, timeout);
                if (res.httpStaus) {

                    document.getElementById('txtStatus').value = "ErrorCode: " + res.data.ErrorCode + " ErrorDescription: " + res.data.ErrorDescription;

                    if (res.data.ErrorCode == "0") {
                        document.getElementById('imgFinger').src = "data:image/bmp;base64," + res.data.BitmapData;
                        var imageinfo = "Quality: " + res.data.Quality + " Nfiq: " + res.data.Nfiq + " W(in): " + res.data.InWidth + " H(in): " + res.data.InHeight + " area(in): " + res.data.InArea + " Resolution: " + res.data.Resolution + " GrayScale: " + res.data.GrayScale + " Bpp: " + res.data.Bpp + " WSQCompressRatio: " + res.data.WSQCompressRatio + " WSQInfo: " + res.data.WSQInfo;
                        document.getElementById('txtImageInfo').value = imageinfo;
                        document.getElementById('txtIsoTemplate').value = res.data.IsoTemplate;
                        document.getElementById('txtAnsiTemplate').value = res.data.AnsiTemplate;
                        document.getElementById('txtIsoImage').value = res.data.IsoImage;
                        document.getElementById('txtRawData').value = res.data.RawData;
                        document.getElementById('txtWsqData').value = res.data.WsqImage;
                    }
                }
                else {
                    alert(res.err);
                }
            }
            catch (e) {
                alert(e);
            }
            return false;
            var textareaValue = document.getElementById('txtIsoTemplate').value;

// Create a FormData object and append the textarea value
var formData = new FormData();
formData.append('textareaData', textareaValue);

// Send an AJAX request to save_student.php
var xhr = new XMLHttpRequest();
xhr.open('POST', 'save_student.php', true);
xhr.onload = function () {
  if (xhr.status === 200) {
    // Request successful, handle the response if needed
    console.log(xhr.responseText);
  } else {
    // Error occurred during the request
    console.error(xhr.statusText);
  }
};
xhr.onerror = function () {
  console.error(xhr.statusText);
};
xhr.send(formData);

return false;
        }

        function Verify() {
            try {
                var isotemplate = document.getElementById('txtIsoTemplate').value;
                var res = VerifyFinger(isotemplate, isotemplate);

                if (res.httpStaus) {
                    if (res.data.Status) {
                        alert("Finger matched");
                    }
                    else {
                        if (res.data.ErrorCode != "0") {
                            alert(res.data.ErrorDescription);
                        }
                        else {
                            alert("Finger not matched");
                        }
                    }
                }
                else {
                    alert(res.err);
                }
            }
            catch (e) {
                alert(e);
            }
            return false;

        }

        function Match() {
            try {
                var isotemplate = document.getElementById('txtIsoTemplate').value;
                var res = MatchFinger(quality, timeout, isotemplate);

                if (res.httpStaus) {
                    if (res.data.Status) {
                        alert("Finger matched");
                    }
                    else {
                        if (res.data.ErrorCode != "0") {
                            alert(res.data.ErrorDescription);
                        }
                        else {
                            alert("Finger not matched");
                        }
                    }
                }
                else {
                    alert(res.err);
                }
            }
            catch (e) {
                alert(e);
            }
            return false;

        }

        function GetPid() {
            try {
                var isoTemplateFMR = document.getElementById('txtIsoTemplate').value;
                var isoImageFIR = document.getElementById('txtIsoImage').value;

                var Biometrics = Array(); // You can add here multiple FMR value
                Biometrics["0"] = new Biometric("FMR", isoTemplateFMR, "UNKNOWN", "", "");

                var res = GetPidData(Biometrics);
                if (res.httpStaus) {
                    if (res.data.ErrorCode != "0") {
                        alert(res.data.ErrorDescription);
                    }
                    else {
                        document.getElementById('txtPid').value = res.data.PidData.Pid
                        document.getElementById('txtSessionKey').value = res.data.PidData.Sessionkey
                        document.getElementById('txtHmac').value = res.data.PidData.Hmac
                        document.getElementById('txtCi').value = res.data.PidData.Ci
                        document.getElementById('txtPidTs').value = res.data.PidData.PidTs
                    }
                }
                else {
                    alert(res.err);
                }

            }
            catch (e) {
                alert(e);
            }
            return false;
        }
        function GetProtoPid() {
            try {
                var isoTemplateFMR = document.getElementById('txtIsoTemplate').value;
                var isoImageFIR = document.getElementById('txtIsoImage').value;

                var Biometrics = Array(); // You can add here multiple FMR value
                Biometrics["0"] = new Biometric("FMR", isoTemplateFMR, "UNKNOWN", "", "");

                var res = GetProtoPidData(Biometrics);
                if (res.httpStaus) {
                    if (res.data.ErrorCode != "0") {
                        alert(res.data.ErrorDescription);
                    }
                    else {
                        document.getElementById('txtPid').value = res.data.PidData.Pid
                        document.getElementById('txtSessionKey').value = res.data.PidData.Sessionkey
                        document.getElementById('txtHmac').value = res.data.PidData.Hmac
                        document.getElementById('txtCi').value = res.data.PidData.Ci
                        document.getElementById('txtPidTs').value = res.data.PidData.PidTs
                    }
                }
                else {
                    alert(res.err);
                }

            }
            catch (e) {
                alert(e);
            }
            return false;
        }
        function GetRbd() {
            try {
                var isoTemplateFMR = document.getElementById('txtIsoTemplate').value;
                var isoImageFIR = document.getElementById('txtIsoImage').value;

                var Biometrics = Array();
                Biometrics["0"] = new Biometric("FMR", isoTemplateFMR, "LEFT_INDEX", 2, 1);
                Biometrics["1"] = new Biometric("FMR", isoTemplateFMR, "LEFT_MIDDLE", 2, 1);
                // Here you can pass upto 10 different-different biometric object.


                var res = GetRbdData(Biometrics);
                if (res.httpStaus) {
                    if (res.data.ErrorCode != "0") {
                        alert(res.data.ErrorDescription);
                    }
                    else {
                        document.getElementById('txtPid').value = res.data.RbdData.Rbd
                        document.getElementById('txtSessionKey').value = res.data.RbdData.Sessionkey
                        document.getElementById('txtHmac').value = res.data.RbdData.Hmac
                        document.getElementById('txtCi').value = res.data.RbdData.Ci
                        document.getElementById('txtPidTs').value = res.data.RbdData.RbdTs
                    }
                }
                else {
                    alert(res.err);
                }

            }
            catch (e) {
                alert(e);
            }
            return false;
        }

        function GetProtoRbd() {
            try {
                var isoTemplateFMR = document.getElementById('txtIsoTemplate').value;
                var isoImageFIR = document.getElementById('txtIsoImage').value;

                var Biometrics = Array();
                Biometrics["0"] = new Biometric("FMR", isoTemplateFMR, "LEFT_INDEX", 2, 1);
                Biometrics["1"] = new Biometric("FMR", isoTemplateFMR, "LEFT_MIDDLE", 2, 1);
                // Here you can pass upto 10 different-different biometric object.


                var res = GetProtoRbdData(Biometrics);
                if (res.httpStaus) {
                    if (res.data.ErrorCode != "0") {
                        alert(res.data.ErrorDescription);
                    }
                    else {
                        document.getElementById('txtPid').value = res.data.RbdData.Rbd
                        document.getElementById('txtSessionKey').value = res.data.RbdData.Sessionkey
                        document.getElementById('txtHmac').value = res.data.RbdData.Hmac
                        document.getElementById('txtCi').value = res.data.RbdData.Ci
                        document.getElementById('txtPidTs').value = res.data.RbdData.RbdTs
                    }
                }
                else {
                    alert(res.err);
                }

            }
            catch (e) {
                alert(e);
            }
            return false;
        }
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("sidebar-collapsed");
        }

        function toggleDropdown(event) {
            event.preventDefault();
            var dropdownContent = event.target.nextElementSibling;
            dropdownContent.classList.toggle("show");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.dropdown-btn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var dropdown = dropdowns[i];
                    if (dropdown.classList.contains('show')) {
                        dropdown.classList.remove('show');
                    }
                }
            }
        };
    </script>
</head>
<body>
<div class="sticky-video">
<video src="5.mp4" autoplay loop muted>
    </div>
    <div id="sidebar" class="sidebar">
        <h1>Attendance System</h1>
        <div class="menu-item">
            <a href="dashboard.php">Dashboard</a>
        </div>
        <div class="dropdown">
        <a href="#" class="dropdown-btn" onclick="toggleDropdown(event)">Manage Student</a>
            <div class="dropdown-content">
                <a href="add_student.php">Add Student</a>
                <a href="view_student.php">View Student</a>
            </div>
        </div>
        <div class="dropdown">
        <a href="#" class="dropdown-btn" onclick="toggleDropdown(event)">Manage Class</a>
            <div class="dropdown-content">
                <a href="add_class.php">Add Class</a>
                <a href="view_class.php">View Class</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="#" class="dropdown-btn" onclick="toggleDropdown(event)">Manage Attendance</a>
            <div class="dropdown-content">
                <a href="take_attendance.php">Take Attendance</a>
                <a href="view_attendance.php">View Attendance</a>
            </div>
        </div>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
    <br>
    <br>
    <br>
    <br>

    <div class="form-container">

       
<form method="POST" action="verify.php">


<div class="img-container">
                <img id="imgFinger" alt="Fingerprint Image"src="2.png" alt="2.png" width="110" height="120" class="my-image" id="image-1">
                
            </div>
            <input type="submit" id="btnCapture" value="Capture" class="add-student-button" onclick="return Capture()" />
                
            <div>
            <textarea id="txtIsoTemplate" name="textareaData"style="width: 100%; height:50px;" class="form-control"></textarea>
            <textarea id="txtIsoTemplate" name="txtIsoTemplate" style="width: 100%; height:50px;"  class="form-control"></textarea>
            <button type="submit" style="align-content:center;" name="submit" class="btn btn-primary btn-100">Take</button>    
           

            </div>
        </form>
            
    <div class="panel" >
                    <input type="text" value="" id="txtStatus"hidden class="form-control" />
                    <input type="text" value="" id="txtImageInfo"hidden class="form-control" />
              
            <!--<tr>
                <td>
                    NFIQ:
                </td>
                <td>
                    <input type="text" value="" id="txtNFIQ" class="form-control" />
                </td>
            </tr>-->
         
                   <!-- Base64Encoded ISO Template-->
          
                    <textarea id="txtIsoTemplate" style="width: 100%; height:50px;"hidden  class="form-control"> </textarea>
   
          
                    <!--Base64Encoded ANSI Template-->
               
                    <textarea id="txtAnsiTemplate" style="width: 100%; height:50px;"hidden  class="form-control"> </textarea>
            
                    <!--Base64Encoded ISO Image-->
            
                    <textarea id="txtIsoImage" style="width: 100%; height:50px;"hidden  class="form-control"> </textarea>

          
                    <!--Base64Encoded Raw Data-->
              
                    <textarea id="txtRawData" style="width: 100%; height:50px;"hidden  class="form-control"> </textarea>
       
                    <!--Base64Encoded Wsq Image Data-->
               
                    <textarea id="txtWsqData" style="width: 100%; height:50px;"hidden  class="form-control"> </textarea>
             
                    <!--Encrypted Base64Encoded Pid/Rbd-->

                    <textarea id="txtPid" style="width: 100%; height:50px;" hidden class="form-control"> </textarea>
</body>
</html>
