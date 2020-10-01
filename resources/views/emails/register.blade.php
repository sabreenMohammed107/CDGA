<!DOCTYPE html>
<html>
<head>
	<title>Round Register </title>  
	<!--<link type="image/x-icon" rel="icon" href="images/icon.ico">-->
	<meta charset="utf-8" />	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />

<style>
body {
    margin: 2em;
    font-family: Arial;
}

.tablerounededCorner {
    border: 1px solid #7a7b7b;
    background-color: #54676529;
    /* border-radius: 1.2em; */
}

.roundedTable {
    border-collapse: collapse;
    /* border-radius: 1.2em; */
    overflow: hidden;
    width: 100%;
    margin: 0;
}

.roundedTable th,
.roundedTable td {
    padding: .6em;
    background: #54676529;
    border-bottom: 1px solid white;
}

.roundedTable th {
    text-align: left;
}
th, td {
  border: 1px solid white;
  padding: 8px;
}


/* .roundedTable tr:last-child td {
    border-bottom: none;
} */
th, td {
  border: 1px solid white;
  padding: 8px;
}


</style>
</head>
<body>
<h3>Round Register </h3>
<div class="tablerounededCorner">
    <table class="table table-bordered table-striped roundedTable">
        <tr>
            
            <th>Salutation</th>

            <th>Full Name</th>
            <th>Course</th>
            <th>Designation</th>
            <th>Company</th>
            <th>Address</th>
            <th>Country</th>
            <th>City</th>
            <th>Email</th>
            <th>Fax</th>
            
          
        </tr>
        <tr>
            <td>{{$register->salut->en_name}}</td>
            <th>{{$register->name}}</th>
            <th>{{$register->round->course->course_en_name}}</th>
            <th>{{$register->job_title}}</th>
            <th>{{$register->company}}</th>
            <th>{{$register->address}}</th>
            <th>{{$register->country->country_en_name}}</th>
            <th>{{$register->venues->venue_en_name}}</th>
            <th>{{$register->email}}</th>
            <th>{{$register->fax}}</th>
          
            
        </tr>
       
    </table>
</div>

<hr>
<h3>Billing Registration</h3>
<div class="tablerounededCorner">
    <table class="table table-bordered table-striped roundedTable">
        <tr>
            
            <th>Salutation</th>

            <th>Full Name</th>
           
            <th>job_title</th>
            <th>Company</th>
            <th>Address</th>
            <th>Country</th>
            <th>City</th>
            <th>Email</th>
            <th>Fax</th>
         
          
        </tr>
        <tr>
            <td>{{$billing->salut->en_name}}</td>
            <th>{{$billing->name}}</th>
          
            <th>{{$billing->job_title}}</th>
            <th>{{$billing->company}}</th>
            <th>{{$billing->address}}</th>
            <th>{{$billing->country->country_en_name}}</th>
            <th>{{$billing->venues->venue_en_name}}</th>
            <th>{{$billing->email}}</th>
            <th>{{$billing->fax}}</th>
           
            
        </tr>
       
    </table>
</div>

</body>
</html>