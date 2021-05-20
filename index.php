<!DOCTYPE html>
<html>
<head>
	<title>Multi Contact Form</title>
        <!--Jquery Link-->
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<!-- Bootstrap Styling-->
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
		<!-- custom stylesheet-->
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<!-- custom javascript-->
        <script src="js/custom.js"></script>
		<script src="js/validation.js"></script>

</head>

<body>
<?php require_once('Validation.php'); ?>
 
    <div class="container">
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
                <div class="panel panel-info0">
                    <form role="form" method="post" action="" name="form1" id="form1">

                    <div class="panel-heading text-center">
                   		<div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
		                        <h4>Multi Contact Form</h4>
		                    </div>
		                    <div class="col-xs-2 col-sm-2 col-md-2">
                                <button class=" list_add_button" type="button">Add Contact</button>
		                    </div>
		                    <div class="col-xs-2 col-sm-2 col-md-2">
                                <button class="list_validate_button" id="btn" type="button">Validate</button>
		                    </div>
		                    <div class="col-xs-2 col-sm-2 col-md-2">
                                <input class="list_save_button" type="submit" value="Save">
		                    </div>
                        </div>
					<hr />
                    <div class="panel-body">

                            
                                <div class="row list_wrapper">
 

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact </label>
                                            <br><hr / style="margin-top: 7%;">
                                        </div>
                                        <div class="form-group">
                                            <label>Name </label><input name="list[0][]" id="fname0" type="text" placeholder="Type  Name" class="form-control"/>
                                            <input type="hidden" name="hid"></div>
                                        <div class="form-group"><label>Email</label>
                                            <input autocomplete="off" name="list[0][]" id="email0" type="text" placeholder="Type Email" class="form-control"/></div>
                                        <div class="form-group"><label>Phone Number</label>
                                            <input autocomplete="off" name="list[0][]" id="phone0" type="text" placeholder="Type Number" class="form-control"/></div>
                                    </div>
 
                                   
                                </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php $i=0;
if(!empty($_REQUEST)){
    $val = new Validation();

    $errName='';
    $output=0;
    foreach($_REQUEST['list'] as $datas){
        $i++;

        $val = new Validation();
        $val->name('Name')->value($datas[0])->pattern('alpha')->required();
        $val->name('Email')->value($datas[1])->pattern('email')->required();
        $val->name('Age')->value($datas[2])->pattern('int')->required();
        
        if($val->isSuccess()){
            $fp = fopen("data_".time()."_".date('d-m-y').".txt", 'w');
            foreach($_REQUEST['list'] as $datas){
                $data = $datas[0].",".$datas[1].",".$datas[2].PHP_EOL;
                fwrite($fp, $data);
                $output=1;
            }
            fclose($fp);
           

        }else{
          echo "<b><u>Form ".$i.": Validation error!</u></b><br />";
            foreach($val->getErrors() as $data){
                echo $data;
            }
        }
    }
    if($output==1)  echo "<b>Data saved into <u>"."data_".time()."_".date('d-m-y').".txt</u> file</b>";
    

}

    
?>


 