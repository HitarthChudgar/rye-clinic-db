<html>
  <head>
    <title>Lab 06</title>
    <style>
      img{
        max-width: 200px;
      }
      table,tr,td{
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <form method=POST>
    <h3>CREATE DATABASE</h3>
    <input type="submit" name="cDOC"
            value="Doctor"/>

    <input type="submit" name="cHC"
            value="Healthcard"/>

    <input type="submit" name="cP"
            value="Patient"/>

    <input type="submit" name="cT"
            value="Treats"/>

    <input type="submit" name="cET"
            value="Exam Type"/>

    <input type="submit" name="cEX"
            value="Exam"/>

    <input type="submit" name="cREF"
            value="Referral"/>

    <input type="submit" name="cRES"
            value="Results"/>

    <input type="submit" name="cPRE"
            value="Prescription"/>

    <input type="submit" name="cAPPT"
            value="Appointment"/>

    <h3>POPULATE DATABASE</h3>
    <input type="submit" name="iDOC"
            value="Doctor"/>

    <input type="submit" name="iHC"
            value="Healthcard"/>

    <input type="submit" name="iP"
            value="Patient"/>

    <input type="submit" name="iT"
            value="Treats"/>

    <input type="submit" name="iET"
            value="Exam Type"/>

    <input type="submit" name="iEX"
            value="Exam"/>

    <input type="submit" name="iREF"
            value="Referral"/>

    <input type="submit" name="iRES"
            value="Results"/>

    <input type="submit" name="iPRE"
            value="Prescription"/>

    <input type="submit" name="iAPPT"
            value="Appointment"/>


    <h3>DELETE DATABASE</h3>
    <input type="submit" name="dDOC"
            value="Doctor"/>

    <input type="submit" name="dHC"
            value="Healthcard"/>

    <input type="submit" name="dP"
            value="Patient"/>

    <input type="submit" name="dT"
            value="Treats"/>

    <input type="submit" name="dET"
            value="Exam Type"/>

    <input type="submit" name="dEX"
            value="Exam"/>

    <input type="submit" name="dREF"
            value="Referral"/>

    <input type="submit" name="dRES"
            value="Results"/>

    <input type="submit" name="dPRE"
            value="Prescription"/>

    <input type="submit" name="dAPPT"
            value="Appointment"/>

    <h3>VIEW DATABASE</h3>
    <input type="submit" name="vDOC"
            value="Doctor"/>

    <input type="submit" name="vHC"
            value="Healthcard"/>

    <input type="submit" name="vP"
            value="Patient"/>

    <input type="submit" name="vT"
            value="Treats"/>

    <input type="submit" name="vET"
            value="Exam Type"/>

    <input type="submit" name="vEX"
            value="Exam"/>

    <input type="submit" name="vREF"
            value="Referral"/>

    <input type="submit" name="vRES"
            value="Results"/>

    <input type="submit" name="vPRE"
            value="Prescription"/>

    <input type="submit" name="vAPPT"
            value="Appointment"/>
    </form>
    <br>
    <?php

      $servername = "localhost";
      $username = "root";
      $password = "";

      // Create connection
      $conn = mysqli_connect($servername, $username, $password);
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      echo "Connected successfully";
      echo "<br>";


      //connect to db
      $conn = mysqli_connect($servername, $username, $password, "medical");
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      else{
        echo "Connected to database medical";
      }
      echo "<br>";



//-------------------DROP TABLES-------------------------

      if(isset($_POST['dDOC'])) {
        $dropDoctors="DROP TABLE doctors";
        if (mysqli_query($conn, $dropDoctors)) {
                echo "Table doctor deleted successfully <br>   ";
        }
        else {
                echo "Error deleting record: " . mysqli_error($conn);
        }
      }

      if(isset($_POST['dHC'])) {
        $dropHC="DROP TABLE healthcard";
        if (mysqli_query($conn, $dropHC)) {
                echo "Table healthcard deleted successfully <br>";
        }
        else {
                echo "Error deleting record: " . mysqli_error($conn);
        }
      }

      if(isset($_POST['dP'])) {
        $dropPatient="DROP TABLE patient";
        if (mysqli_query($conn, $dropPatient)) {
                echo "Table patient deleted successfully <br>";
        }
        else {
                echo "Error deleting record: " . mysqli_error($conn);
        }
      }

      if(isset($_POST['dET'])) {
        $dropET="DROP TABLE exam_type";
        if (mysqli_query($conn, $dropET)) {
                echo "Table exam deleted successfully <br>";
        }
        else {
                echo "Error deleting record: " . mysqli_error($conn);
        }
      }

      if(isset($_POST['dEX'])) {
        $dropExam="DROP TABLE exam";
        if (mysqli_query($conn, $dropExam)) {
                echo "Table example deleted successfully <br>";
        }
        else {
                echo "Error deleting record: " . mysqli_error($conn);
        }
      }

      if(isset($_POST['dT'])) {
        $dropTreats="DROP TABLE treats";
        if (mysqli_query($conn, $dropTreats)) {
                echo "Table treats deleted successfully <br>";
        }
        else {
                echo "Error deleting record: " . mysqli_error($conn);
        }
      }

      if(isset($_POST['dREF'])) {
        $dropRef="DROP TABLE referral";
        if (mysqli_query($conn, $dropRef)) {
                echo "Table referral deleted successfully <br>";
        }
        else {
                echo "Error deleting record: " . mysqli_error($conn);
        }
      }

      if(isset($_POST['dRES'])) {
        $dropRes="DROP TABLE results";
        if (mysqli_query($conn, $dropRes)) {
                echo "Table results deleted successfully <br>";
        }
        else {
                echo "Error deleting record: " . mysqli_error($conn);
        }
      }

      if(isset($_POST['dPRE'])) {
        $dropPre="DROP TABLE prescription";
        if (mysqli_query($conn, $dropPre)) {
                echo "Table prescription deleted successfully <br>";
        }
        else {
                echo "Error deleting record: " . mysqli_error($conn);
        }
      }

      if(isset($_POST['dAPPT'])) {
        $dropAppt="DROP TABLE appointment";
        if (mysqli_query($conn, $dropAppt)) {
                echo "Table appointments deleted successfully <br>";
        }
        else {
                echo "Error deleting record: " . mysqli_error($conn);
        }
      }


//-------------------------Doctor--------------------------


      if(isset($_POST['cDOC'])) {
        echo "<br>";
        $createDoctors = "CREATE TABLE doctors (
                doctor_id int(4) primary key,
                specialization varchar(30),
                first_name varchar(15),
                last_name varchar(15),
                phone_extension int(12) not null unique)";
        if ($conn->query($createDoctors) === TRUE) {
          echo "Table doctors created successfully <br>";
        }
        else {
            echo "Error creating table: " . $conn->error . "<br>";
        }
      }

      if(isset($_POST['iDOC'])) {
        $insertDoctors = "INSERT INTO doctors (doctor_id, specialization, first_name,last_name,phone_extension)
                VALUES(1001, 'family physician', 'albus', 'dumbledore', 415),
                      (1002, 'orthopaedic surgeon', 'sun', 'wukong', 512),
                      (1003, 'pharmacist', 'lee', 'sin', 312),
                      (1004, 'xray', 'john', 'doe', 433),
                      (1005, 'blood work', 'jane', 'low', 500)";
        if ($conn->query($insertDoctors) === TRUE) {
            echo "New records created successfully <br>";
        }
        else {
            echo "Error: " . $insertDoctors . "<br>" . $conn->error;
        }
      }

      if(isset($_POST['vDOC'])) {
        $viewDoctors = "SELECT * FROM doctors";
        $resultDoctors = $conn->query($viewDoctors);
        if(mysqli_num_rows($resultDoctors) > 0){
          echo "<table>";
              echo "<tr>";
                  echo "<th>First Name</th>";
                  echo "<th>Last Name</th>";
                  echo "<th>Specialization</th>";
                  echo "<th>Ext</th>";
              echo "</tr>";
            while($row = mysqli_fetch_array($resultDoctors)){
                echo "<tr>";
                    echo "<td>" . $row['first_name'] . "</td>";
                    echo "<td>" . $row['last_name'] . "</td>";
                    echo "<td>" . $row['specialization'] . "</td>";
                    echo "<td>" . $row['phone_extension'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else{
            echo "No records matching your query were found.";
        }
      }



//-----------------------HEALTHCARD-------------------------------------------



      if(isset($_POST['cHC'])) {
        echo "<br>";
        $createHealthcard = "CREATE TABLE healthcard (
                patient_healthcard int(10) primary key,
                first_name varchar(15),
                last_name varchar(15)
                )";
        if ($conn->query($createHealthcard) === TRUE) {
          echo "Table healthcard created successfully <br>";
        }
        else {
            echo "Error creating table: " . $conn->error . "<br>";
        }
      }

      if(isset($_POST['iHC'])) {
        $insertHC = "INSERT INTO healthcard (patient_healthcard, first_name,last_name)
                VALUES(1231230001, 'raj', 'mistry'),
                      (1231230002, 'hitarth', 'chudgar'),
                      (1231230003, 'aayush', 'regmi'),
                      (1231230004, 'red', 'sus')";
        if ($conn->query($insertHC) === TRUE){
            echo "New records created successfully for healthcard<br>";
        }
        else {
            echo "Error: " . $insertHC . "<br>" . $conn->error;
        }
      }

      if(isset($_POST['vHC'])) {
        $viewHC = "SELECT * FROM healthcard";
        $resultHC = $conn->query($viewHC);
        if(mysqli_num_rows($resultHC) > 0){
          echo "<table>";
              echo "<tr>";
                  echo "<th>Healthcard</th>";
                  echo "<th>First Name</th>";
                  echo "<th>Last Name</th>";
              echo "</tr>";
            while($row = mysqli_fetch_array($resultHC)){
                echo "<tr>";
                    echo "<td>" . $row['patient_healthcard'] . "</td>";
                    echo "<td>" . $row['first_name'] . "</td>";
                    echo "<td>" . $row['last_name'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else{
            echo "No records matching your query were found.";
        }
      }


//-------------------------------PATIENT---------------------------------------



      if(isset($_POST['cP'])) {
        echo "<br>";
        $createPatient = "CREATE table patient(
              patient_id int(4) primary key,
              patient_healthcard int(10) REFERENCES healthcard(patient_healthcard),
              phone_number int(11),
              address varchar(50))";
        if ($conn->query($createPatient) === TRUE) {
          echo "Table healthcard created successfully <br>";
        }
        else {
            echo "Error creating table: " . $conn->error . "<br>";
        }
      }

      if(isset($_POST['iP'])) {
        $insertPatient = "INSERT INTO patient (patient_id, patient_healthcard, phone_number,address)
        VALUES(2001, 1231230001, 16471230001,'1 Streetname Road'),
              (2002, 1231230002, 16471230002,'2 Streetname Road'),
              (2003, 1231230003, 16471230003,'3 Streetname Road'),
              (2004, 1231230004, 16471230004,'4 Streetname Road')
              ";
        if ($conn->query($insertPatient) === TRUE){
            echo "New records created successfully for patient<br>";
        }
        else {
            echo "Error: " . $insertPatient . "<br>" . $conn->error;
        }
      }

      if(isset($_POST['vP'])) {
        $viewPatient = "SELECT * FROM patient";
        $resultPatient = $conn->query($viewPatient);
        if(mysqli_num_rows($resultPatient) > 0){
          echo "<table>";
              echo "<tr>";
                  echo "<th>Healthcard</th>";
                  echo "<th>Phone Number</th>";
                  echo "<th>Address</th>";
              echo "</tr>";
            while($row = mysqli_fetch_array($resultPatient)){
                echo "<tr>";
                    echo "<td>" . $row['patient_healthcard'] . "</td>";
                    echo "<td>" . $row['phone_number'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else{
            echo "No records matching your query were found.";
        }
      }



//---------------------EXAM TPYE--------------------------


      if(isset($_POST['cET'])) {
        echo "<br>";
        $createExamType = "CREATE TABLE exam_type (
                exam_type varchar(30) primary key,
                exam_length int not null
                )";
        if ($conn->query($createExamType) === TRUE) {
          echo "Table exam_type created successfully <br>";
        }
        else {
            echo "Error creating table: " . $conn->error . "<br>";
        }
      }

      if(isset($_POST['iET'])) {
        $insertET = "INSERT INTO exam_type (exam_type, exam_length)
                VALUES('blood test', 20),
                      ('xray',40),
                      ('check up', 20)";
        if ($conn->query($insertET) === TRUE){
            echo "New records created successfully for exam type<br>";
        }
        else {
            echo "Error: " . $insertET . "<br>" . $conn->error;
        }
      }

      if(isset($_POST['vET'])) {
        $viewPatient = "SELECT * FROM exam_type";
        $resultHC = $conn->query($viewPatient);
        if(mysqli_num_rows($resultHC) > 0){
          echo "<table>";
              echo "<tr>";
                  echo "<th>Exam Type</th>";
                  echo "<th>Exam Length</th>";
              echo "</tr>";
            while($row = mysqli_fetch_array($resultHC)){
                echo "<tr>";
                    echo "<td>" . $row['exam_type'] . "</td>";
                    echo "<td>" . $row['exam_length'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else{
            echo "No records matching your query were found.";
        }
      }


//--------------------------------EXAM ---------------------------------

      if(isset($_POST['cEX'])) {
        echo "<br>";
        $createExam = "CREATE TABLE exam (
                  exam_id int(4) primary key,
                  patient_id int(4) references patient(patient_id),
                  exam_type varchar(30) references exam_type(exam_type)
                  )";
          if ($conn->query($createExam) === TRUE) {
            echo "Table exam created successfully <br>";
          }
          else {
              echo "Error creating table exam : " . $conn->error . "<br>";
          }
      }

      if(isset($_POST['iEX'])) {
        $insertExam = "INSERT INTO exam(exam_id,patient_id,exam_type)
              VALUES(3002,2002,'xray'),
                    (3001,2001,'blood test'),
                    (3003,2003,'check up')";
        if ($conn->query($insertExam) === TRUE){
            echo "New records created successfully for exam<br>";
        }
        else {
            echo "Error: " . $insertExam . "<br>" . $conn->error;
        }
      }

      if(isset($_POST['vEX'])) {
        $viewExam = "SELECT * FROM exam";
        $resultExam = $conn->query($viewExam);
        if(mysqli_num_rows($resultExam) > 0){
          echo "<table>";
              echo "<tr>";
                  echo "<th>Patient ID</th>";
                  echo "<th>Exam Type</th>";
              echo "</tr>";
            while($row = mysqli_fetch_array($resultExam)){
                echo "<tr>";
                    echo "<td>" . $row['patient_id'] . "</td>";
                    echo "<td>" . $row['exam_type'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else{
            echo "No records matching your query were found.";
        }
      }


//---------------------------------TREATS----------------------------------


      if(isset($_POST['cT'])) {
        echo "<br>";
        $createTreats = "CREATE TABLE treats(
                      doctor_id int(4) references doctor(doctor_id),
                      patient_id int(4) references patient(patient_id),
                      constraint primary key(doctor_id, patient_id))";
          if ($conn->query($createTreats) === TRUE) {
            echo "Table treatment created successfully <br>";
          }
          else {
              echo "Error creating table exam : " . $conn->error . "<br>";
          }
      }

      if(isset($_POST['iT'])) {
        $insertTreats = "INSERT INTO treats(doctor_id,patient_id)
                        VALUES(1001,2001),
                              (1002,2002),
                              (1003,2003),
                              (1003,2004),
                              (1004,2004),
                              (1005,2002) ";
        if ($conn->query($insertTreats) === TRUE){
            echo "New records created successfully for treats<br>";
        }
        else {
            echo "Error: " . $insertTreats . "<br>" . $conn->error;
        }
      }

      if(isset($_POST['vT'])) {
        $viewTreats = "SELECT * FROM treats";
        $resultTreats = $conn->query($viewTreats);
        if(mysqli_num_rows($resultTreats) > 0){
          echo "<table>";
              echo "<tr>";
                  echo "<th>Doctor ID</th>";
                  echo "<th>Patient ID</th>";
              echo "</tr>";
            while($row = mysqli_fetch_array($resultTreats)){
                echo "<tr>";
                    echo "<td>" . $row['doctor_id'] . "</td>";
                    echo "<td>" . $row['patient_id'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else{
            echo "No records matching your query were found.";
        }
      }


//-------------------------------REFERRAL-----------------------------------


      if(isset($_POST['cREF'])) {
        echo "<br>";
        $createTreats = "CREATE TABLE referral(
                      patient_id int(4) references patient(patient_id),
                      doctor_id int(4) references doctor(doctor_id),
                      exam_id int(4) references exam(exam_id),
                      primary key(exam_id))";
        if ($conn->query($createTreats) === TRUE) {
          echo "Table referral created successfully <br>";
        }
        else {
            echo "Error creating table exam : " . $conn->error . "<br>";
        }
      }

      if(isset($_POST['iREF'])) {
        $insertTreats = "INSERT INTO referral(doctor_id,patient_id,exam_id)
              VALUES(1001,2001,3001),
                    (1002,2002,3002),
                    (1003,2003,3003)";
        if ($conn->query($insertTreats) === TRUE){
            echo "New records created successfully for referral<br>";
        }
        else {
            echo "Error: " . $insertExam . "<br>" . $conn->error;
        }
      }

      if(isset($_POST['vREF'])) {
        $viewRef = "SELECT * FROM referral";
        $resultRef = $conn->query($viewRef);
        if(mysqli_num_rows($resultRef) > 0){
          echo "<table>";
              echo "<tr>";
                  echo "<th>Exan ID</th>";
                  echo "<th>Doctor ID</th>";
                  echo "<th>Patient ID</th>";
              echo "</tr>";
            while($row = mysqli_fetch_array($resultRef)){
                echo "<tr>";
                    echo "<td>" . $row['exam_id'] . "</td>";
                    echo "<td>" . $row['doctor_id'] . "</td>";
                    echo "<td>" . $row['patient_id'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else{
            echo "No records matching your query were found.";
        }
      }


//=============================RESULTS---------------------------------------


      if(isset($_POST['cRES'])) {
        echo "<br>";
        $createResults = "CREATE TABLE results(
                  result_id int(4) primary key,
                  exam_id int(4) references exam(exam_id),
                  doctor_id int(4) references doctor(doctor_id),
                  exam_result varchar(300))";
        if ($conn->query($createResults) === TRUE) {
          echo "Table result created successfully <br>";
        }
        else {
            echo "Error creating table exam : " . $conn->error . "<br>";
        }
      }

      if(isset($_POST['iRES'])) {
        $insertResults = "INSERT INTO results(result_id,exam_id,doctor_id,exam_result)
                      VALUES(4001,3001,1005,'iron deficiency'),
                            (4002,3002,1004,'arthritis'),
                            (4003,3003,1003,'bacterial infection')";
        if ($conn->query($insertResults) === TRUE){
            echo "New records created successfully for results<br>";
        }
        else {
            echo "Error: " . $insertResults . "<br>" . $conn->error;

        }
      }

      if(isset($_POST['vRES'])) {
        $viewRes = "SELECT * FROM results";
        $resultRes = $conn->query($viewRes);
        if(mysqli_num_rows($resultRes) > 0){
          echo "<table>";
              echo "<tr>";
                  echo "<th>Exan ID</th>";
                  echo "<th>Doctor ID</th>";
                  echo "<th>Result</th>";
              echo "</tr>";
            while($row = mysqli_fetch_array($resultRes)){
                echo "<tr>";
                    echo "<td>" . $row['exam_id'] . "</td>";
                    echo "<td>" . $row['doctor_id'] . "</td>";
                    echo "<td>" . $row['exam_result'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else{
            echo "No records matching your query were found.";
        }
      }

//------------------------------PRESCRIPTIONS---------------------------------

      if(isset($_POST['cPRE'])) {
        echo "<br>";
        $createPre = "CREATE TABLE prescription(
                    prescription_id int(4) primary key,
                    patient_id int(4) references patient(patient_id),
                    result_id int(4) references results(result_id),
                    doctor_id int(4) references doctor(doctor_id),
                    medication varchar(30),
                    dosage varchar(30),
                    diagnosis varchar(100))";
        if ($conn->query($createPre) === TRUE) {
          echo "Table prescription created successfully <br>";
        }
        else {
            echo "Error creating table exam : " . $conn->error . "<br>";
        }
      }

      if(isset($_POST['iPRE'])) {
        $insertPre = "INSERT INTO prescription(prescription_id, patient_id, doctor_id,result_id, medication, dosage)
                          VALUES(5001,2001,1001,4001,'iron pills','100mg'),
                                (5002,2002,1002,4002,'tylenol','500mg'),
                                (5003,2003,1003,4003,'antibiotics','100mg')";
        if ($conn->query($insertPre) === TRUE){
            echo "New records created successfully for prescription<br>";
        }
        else {
            echo "Error: " . $insertPre . "<br>" . $conn->error;

        }
      }

      if(isset($_POST['vPRE'])) {
        $viewPre = "SELECT * FROM prescription";
        $resultPre = $conn->query($viewPre);
        if(mysqli_num_rows($resultPre) > 0){
          echo "<table>";
              echo "<tr>";
                  echo "<th>Doctor ID</th>";
                  echo "<th>Patient ID</th>";
                  echo "<th>Result ID</th>";
                  echo "<th>Medication</th>";
                  echo "<th>Dosage</th>";
              echo "</tr>";
            while($row = mysqli_fetch_array($resultPre)){
                echo "<tr>";
                    echo "<td>" . $row['doctor_id'] . "</td>";
                    echo "<td>" . $row['patient_id'] . "</td>";
                    echo "<td>" . $row['result_id'] . "</td>";
                    echo "<td>" . $row['medication'] . "</td>";
                    echo "<td>" . $row['dosage'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else{
            echo "No records matching your query were found.";
        }
      }

//----------------------------------APPT----------------------------------------



      if(isset($_POST['cAPPT'])) {
        echo "<br>";
        $createAppt = "CREATE TABLE appointment(
                      appointment_date varchar(20),
                      appointment_time varchar(20),
                      patient_id int(4) references patient(patient_id),
                      doctor_id int(4) references doctor(doctor_id),
                      exam_id int(4) references exam(exam_id),
                      primary key(exam_id))";
        if ($conn->query($createAppt) === TRUE) {
          echo "Table appointment created successfully <br>";
        }
        else {
            echo "Error creating table exam : " . $conn->error . "<br>";
        }
      }

      if(isset($_POST['iAPPT'])) {
        $insertAppt = "INSERT INTO appointment(appointment_date, appointment_time, patient_id, doctor_id, exam_id)
                      VALUES('October 1st 2020', '13:00', 2001, 1001, 3001),
                            ('October 2nd 2020', '14:00', 2002, 1002, 3002),
                            ('October 3rd 2020', '15:00', 2003, 1003, 3003)
                            ";
        if ($conn->query($insertAppt) === TRUE){
            echo "New records created successfully for appointments<br>";
        }
        else {
            echo "Error: " . $insertPre . "<br>" . $conn->error;
        }
      }

      if(isset($_POST['vAPPT'])) {
        $viewAppt = "SELECT * FROM appointment";
        $resultAppt = $conn->query($viewAppt);
        if(mysqli_num_rows($resultAppt) > 0){
          echo "<table>";
              echo "<tr>";
                  echo "<th>Date</th>";
                  echo "<th>Time</th>";
                  echo "<th>Doctor ID</th>";
                  echo "<th>Patient ID</th>";
                  echo "<th>Exam ID</th>";
              echo "</tr>";
            while($row = mysqli_fetch_array($resultAppt)){
                echo "<tr>";
                    echo "<td>" . $row['appointment_date'] . "</td>";
                    echo "<td>" . $row['appointment_time'] . "</td>";
                    echo "<td>" . $row['doctor_id'] . "</td>";
                    echo "<td>" . $row['patient_id'] . "</td>";
                    echo "<td>" . $row['exam_id'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else{
            echo "No records matching your query were found.";
        }
      }
      
      $conn->close();
    ?>
  </body>
</html>
