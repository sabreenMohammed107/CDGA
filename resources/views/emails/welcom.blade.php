<!DOCTYPE html>
<html>
<head>
	<title>Client Message</title>  
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
    background-color: #bbe3dd1c;
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
    background: #bbe3dd1c;
    border-bottom: 1px solid white;
}

.roundedTable th {
    text-align: left;
}
th, td {
  border: 1px solid #EEE;
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
<h3>Client Message </h3>
<div class="tablerounededCorner">
    <table class="table table-bordered table-striped roundedTable">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
        </tr>
        <tr>
            <td>{{$user->sender_name}}</td>
            <td>{{$user->sender_email}}</td>
            <td>{{$user->sender_subject}}</td>
            <td>{{$user->sender_message}}</td>
        </tr>
       
    </table>
</div>

</body>
</html>