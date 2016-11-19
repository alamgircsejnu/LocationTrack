<!DOCTYPE html>
<html>
<head>
    <title>
        GPS-TRACKER
    </title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="asset/js/css/blitzer/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css">
</head>

<body style="background-color: #ADD8E6">
<div class="row" style="background-color: #006dcc;height: 40px">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div style="margin: 4px">
            <a href="reportAccess.php" style="color: white;text-decoration: none;font-size: 20px">Report</a>&nbsp&nbsp&nbsp&nbsp
            <a href="mapAccess.php" style="color: white;text-decoration: none;font-size: 20px">Map </a>&nbsp&nbsp&nbsp&nbsp
            <a href="register.php" style="color: white;text-decoration: none;font-size: 20px">Register</a>&nbsp&nbsp&nbsp&nbsp
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
<br><br><br>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4"><br><br>
        <div  style="background-color: aliceblue">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10" style="margin-top: 4%;margin-bottom: 4%">
                    <form role="form" action="LocationsInMap.php" method="post">
                        <div class="form-group">
                            <label for="deviceId">Device ID</label>
                            <input type="text" class="form-control" name="deviceId" id="deviceId" placeholder="Enter Your Device ID" required>
                        </div>
                        <div class="form-group">
                            <label for="deviceId">Date From</label>
                            <input type="text" class="form-control" name="dateFrom" id="dateFrom" required>
                        </div>
                        <div class="form-group">
                            <label for="deviceId">Date To</label>
                            <input type="text" class="form-control" name="dateTo" id="dateTo" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <!--                <button type="submit" class="form-group btn btn-primary">Create Task</button>-->
                            <input type="submit" class="form-control" value="See Map" style="background-color: #006dcc;color: #ffffff">
                        </div>
                    </form>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="asset/js/jquery-ui-1.10.4.custom.min.js"></script>

<script type="text/javascript">
    $(function () {
        $("#dateFrom").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+10"
        });
    });
</script>
<style>
    .ui-datepicker{
        font-size: 15px;
    }
</style>
<script type="text/javascript">
    $(function () {
        $("#dateTo").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+10"
        });
    });
</script>
<style>
    .ui-datepicker{
        font-size: 15px;

    }
    .ui-datepicker select.ui-datepicker-month, .ui-datepicker select.ui-datepicker-year {
        color: #2b669a;
        font-family: ...;
        font-size: 16px;
        font-weight: bold;
    }

</style>

</body>
</html>