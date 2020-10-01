<!DOCTYPE html>
<html>
<head>
	<title>Quick Enquery /Request Inhouse </title>  
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
<h3>Quick Enquery /Request Inhouse</h3>
<div class="tablerounededCorner">
    <table class="table table-bordered table-striped roundedTable">
        <tr>
            
            <th>Salutation</th>
            <th>Full Name</th>
            <th>Course</th>
            <th>Designation</th>
            <th>Company</th>
            <th>Address</th>
            <th>City</th>
            <th>Country</th>
            <th>Email</th>
            <th>Enquiry</th>
            <th>requirements</th>
          
        </tr>
        <tr>
            <td>{{$enquery->salut->en_name}}</td>
            <th>{{$enquery->name}}</th>
            <th>{{$enquery->courses->course_en_name}}</th>
            <th>{{$enquery->job_title}}</th>
            <th>{{$enquery->company}}</th>
            <th>{{$enquery->address}}</th>
            <th>{{$enquery->country->country_en_name}}</th>
            <th>{{$enquery->venues->venue_en_name}}</th>
            <th>{{$enquery->email}}</th>
            <th>{{$enquery->quk_enquery_notes}}</th>
            <th>{{$enquery->inhouse_requirements}}</th>
            
        </tr>
       
    </table>
</div>

</body>
</html>