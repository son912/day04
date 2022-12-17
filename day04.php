<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký sinh viên KHTN</title>

    <script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>

    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'></script>
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css' media="screen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js" type="text/javascript"></script>

    <style type="text/css">
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 500px;
            margin-top: 10px;
            width: 50vw;
        }

        .form-group {
            width: 35vw;
            height: inherit;
            background-color: white;
            padding: 2rem;
            margin-top: 2rem;
            display: flex;
            flex-direction: column;
            border: 2px solid #4f85b4;
        }

        .my-row-input {
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            margin: 1.4rem 0px;
        }

        .my-row-label {
            background-color: #82a827;
            height: inherit;
            min-width: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            border: 1px solid #4f85b4;
            color: white;
        }

        .input-text {
            height: inherit;
            width: 200px;
            padding: 0px;
            border: 2px solid #3d82db;
        }

        .form-input-radio {
            display: flex;
            align-items: center;
            height: inherit;
            width: 200px;
            padding: 0px;
        }

        .form-input-select {
            display: flex;
            align-items: center;
            height: inherit;
            width: 200px;
            padding: 0px;

        }

        .form-input-select select {
            border: 2px solid #4f85b4;
        }

        .arrow::before {
            content: "";
            position: relative;
            right: 23px;
            top: 23px;
            left: -34px;
            width: 0;
            height: 0;
            border-left: 18px solid transparent;
            border-right: 18px solid transparent;
            border-top: 30px solid #70ad46;
        }

        .input-birthdate {
            display: flex;
            align-items: center;
            height: inherit;
            width: 145px;
            margin-right: 55px;
            padding: 0px 0px 0px 10px;
            box-sizing: border-box;
            border: 2px solid #4f85b4;
        }

        .my-row-input-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 2rem;
        }

        .btn-submit {
            height: 44px;
            width: 140px;
            border-radius: 5px;
            border: 2px solid #4f85b4;
            background-color: #82a827;
            color: white;
        }

        .error {
            color: red;
            margin-left: 35px;
        }
    </style>
</head>

<body>
    <?php
    $error = array();
    $data = array();
    $reg = "/^[0-9]{1,2}\\/[0-9]{1,2}\\/[0-9]{4}$/";
    if (!empty($_GET['btnSubmit'])) {
        // Get data
        $data['userName'] = isset($_GET['userName']) ? $_GET['userName'] : '';
        $data['gender'] = isset($_GET['gender']) ? $_GET['gender'] : '';
        $data['faculty'] = isset($_GET['faculty']) ? $_GET['faculty'] : '';
        $data['birthdate'] = isset($_GET['birthdate']) ? $_GET['birthdate'] : '';

        // Validate
        if (empty($data['userName'])) {
            $error['userName'] = 'Hãy nhập tên.';
        }

        if (empty($data['gender'])) {
            $error['gender'] = 'Hãy chọn giới tính.';
        }
        if (empty($data['faculty'])) {
            $error['faculty'] = 'Hãy chọn khoa.';
        }
        if (empty($data['birthdate'])) {
            $error['birthdate'] = 'Hãy nhập ngày sinh.';
        }
    }
    ?>
    <div class="container">
        <div class="form-group">
            <?php
            if ($error) {
                foreach ($error as $key => $value) {
                    echo "<p class='error'> $value </p>";
                }
            }
            ?>
            <form action="day04.php" method="GET" id="form">
                <div class="my-row-input">
                    <label class="my-row-label">Họ và tên<span style="color: red"> *</span></label>

                    <input type="text" name="userName" id="userName" class="input-text" size="30">
                </div>

                <div class="my-row-input">
                    <label class="my-row-label">Giới tính<span style="color: red"> *</span></label>

                    <div class="form-input-radio">
                        <?php
                        $gender = array('genderMale' => 'Nam', 'genderFemale' => 'Nữ');
                        foreach ($gender as $key => $value) {
                            echo "<input type='radio' id='$key' name='gender' value='$value'>";
                            echo "<label for='$key' style='margin: 6px 6px 0px'>$value</label>";
                        }
                        ?>
                    </div>
                </div>

                <div class="my-row-input">
                    <label class="my-row-label">Phân khoa<span style="color: red"> *</span></label>

                    <div class="form-input-select">
                        <select id="faculty" name="faculty" id="faculty" style="height: inherit">
                            <?php
                            $faculty = array('0' => '', 'MAT' => 'Khoa học máy tính', 'KDL' => 'Khoa học vật liệu');
                            foreach ($faculty as $key => $value) {
                                echo "<option value='$key'>$value</option>";
                            }
                            ?>
                        </select>
                        <div class="arrow"></div>
                    </div>
                </div>

                <div class="my-row-input">
                    <label class="my-row-label">Ngày sinh<span style="color: red"> *</span>
                    </label>
                    <input type="text" name="birthdate" id="birthdate" class="input-birthdate" placeholder="dd/mm/yyyy">
                </div>

                <div class="my-row-input">
                    <label class="my-row-label">Địa chỉ</label>
                    <input type="text" name="address" id="address" class="input-text">
                </div>

                <div class="my-row-input-btn">
                    <input type="submit" name="btnSubmit" id="btnSubmit" class="btn-submit" value="Đăng ký">
                </div>

            </form>
        </div>
    </div>

    <script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'></script>
    <!-- Bootstrap -->
    <!-- Bootstrap DatePicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap DatePicker -->
    <script type="text/javascript">
        $(function() {
            $('#birthdate').datepicker({
                format: "dd/mm/yyyy"
            });
        });
    </script>
</body>

</html>