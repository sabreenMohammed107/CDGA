<!DOCTYPE html>
<html>
<head>
	<title>Download Brochure </title>  
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
<h3>Download Brochure </h3>
<div class="tablerounededCorner">
    <table class="table table-bordered table-striped roundedTable">
        <tr>
            
           
            <th>Full Name</th>
            <th>Course</th>
            <th>Company</th>
            <th>Job-Title</th>
            <th>Country</th>
          
           
            <th>Email</th>
           
        </tr>
        <tr>
           
            <th>{{$dawn->name}}</th>
            <th>{{$dawn->courses->course_en_name}}</th>
            <th>{{$dawn->company}}</th>
            <th>{{$dawn->job_title}}</th>
          
            <th>{{$dawn->country->country_en_name}}</th>
          
            <th>{{$dawn->email}}</th>
       
            
        </tr>
       
    </table>
</div>

</body>
</html>