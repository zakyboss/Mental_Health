<!DOCTYPE html>
<html>
<head>
    <style>
    table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
}

th {
    background-color: palevioletred;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
}</style>
<Title>Contact us</Title>
       <!-- charset -->
<meta charset="UTF-8">
           <!-- Description -->
  <meta name="description" content="A website about mental health specifically depression">
         <!-- Author  -->
  <meta name="author" content="Zakariya Mohamed">
          <!-- viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
            

  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="assets/images/favicon.png">

   <!-- Adding font awesome icon links  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/solid.min.css" integrity="sha512-Hp+WwK4QdKZk9/W0ViDvLunYjFrGJmNDt6sCflZNkjgvNq9mY+0tMbd6tWMiAlcf1OQyqL4gn2rYp7UsfssZPA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 </head>
  <!-- Our Page Content Goes Here -->
 <body>
     <!-- Heder section -->
     <header >
      <div class="logo">
          <a href="#">
              <img src="assets/images/logo.png" alt="logo" srcset="" >
             </a>
      </div>
          <!-- Navigation -->

         <nav class="menu">
             <!-- home link -->
             
             <a href="index.html">
  <i class="fa fa-home"></i> Home
             </a>

             
           <!-- About  link -->
          <a href="about.html">
            <i class=" fa-solid fa-circle-info"></i> About Us
              </a>

             <!-- our professionals link -->
             <a href="mhp.html">
                 <i class="fa-solid fa-handshake-angle"></i> Get Help
                            </a>
        

             <!-- Report link -->
             <a href="report.html">
                 <i class="fa-solid fa-people-group"></i> Check Status
             </a>

             
             <!-- Contacts link -->
             <a href="contact.html">
  <i class="fa-sharp fa-solid fa-envelope"></i> Contact Us 
             </a>

         </nav>
</div>
     </header>

     <section style="margin-top: 130px;">
<h1>Mental Health Professionals</h1>
<p>Find a qualified mental health professional near who specializes in depression and related issues . Connect with experts who can provide the support and  guidance you need on your journey to healing .</p>
<table style="width: 100%; border-collapse: collapse;">
   <thead>
<tr style="height: 30px; background-color: palevioletred; text-align: left;">
        <th style="padding: 10px;">Photo</th>
        <th style="padding: 10px;">Title</th>
        <th style="padding: 10px;">Name</th>
        <th style="padding: 10px;">Contact</th>
        <th style="padding: 10px;">License Number</th>
        <th style="padding: 10px;">Specialization</th>
        <th style="padding: 10px;">Years of Experience</th>
        <th style="padding: 10px;">Location</th>
    </tr>
    </thead>
    <tbody>
        <?php
       
       require_once 'php/db.php';
       //2. select query
       $sql = "SELECT * FROM mhp";
       //3.execute the query
                           $result = $conn->query($sql) ;
                           //4. if there are results, show theme..
                           if($result->num_rows > 0):
                               
                           else:
                               echo '';
                           endif;
       //4.1 Show the data
                        //[
                        //  ['id'=>1,'name'=>'Jj'..]
                        //  ['id'=>2,'name'=>'Kk'..]
                        //  ['id'=>3,'name'=>'Ll'..]
                        //]
                        while($row = $result->fetch_assoc()):
//4.2 assing the data to variables
$id = $row['id'];
$photo = $row['photo'];
$title = $row['title'];
$name = $row['name'];
$contact = $row['contact'];
$license_number = $row['license_number'];
$special = $row['special'];
$yos = $row['yos'];
$location = $row['location'];
//4.3 display the data
echo "<tr>";
//the photo
echo "<td><img src='$photo'></td>";
//the name
                                echo "<td>$title.$name</td>" ;
                                //the contact
                                echo "<td>$contact</td>" ;
                                //the license_number
                                echo "<td>$license_number</td>" ;
                                //the specialization
                                echo "<td>$special</td>" ;
                                //the yos
                                echo "<td>$yos</td>" ;
                                //the location
                                echo "<td>$location</td>" ;
                                   
                                
echo "</tr>";
                        endwhile;
     
     ?>
    </tbody>
   
</table>

     <br><br>
     <footer>
        Tune Me Up &copy; 2024
        
                       </footer>
        
     </body>
    </html>