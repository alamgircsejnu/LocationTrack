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
</head>

<body>
<br><br><br>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4"><br><br>
        <div  style="background-color: aliceblue">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10" style="margin-top: 4%;margin-bottom: 4%">
                    <form role="form" action="report.php" method="post">
                        <div class="form-group">
                            <label for="deviceId">Device ID</label>
                            <input type="text" class="form-control" name="deviceId" id="deviceId" placeholder="Enter Your Device ID" required>
                        </div>
                        <div class="form-group">
                            <label for="deviceId">Date From</label>
                            <input type="date" class="form-control" name="dateFrom" id="deviceId" required>
                        </div>
                        <div class="form-group">
                            <label for="deviceId">Date To</label>
                            <input type="date" class="form-control" name="dateTo" id="deviceId" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <!--                <button type="submit" class="form-group btn btn-primary">Create Task</button>-->
                            <input type="submit" class="form-control" value="See Report" style="background-color: #006dcc;color: #ffffff">
                        </div>
                    </form>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>

</body>
</html>