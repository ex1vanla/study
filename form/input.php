<?php
session_start();
require 'validation.php';

// Chong clickjacking
header('X-FRAME-OPTIONS:DENY');
// if(!empty ($_GET['your_name'])){
//     var_dump($_GET['your_name']) ;
// }
if (!empty($_POST)) {
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
}

function checktext($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}


//連想配列
$pageFlag = 0;
$errors = validation($_POST);

if (!empty($_POST['btn_confirm']) && empty($errors)) {
    $pageFlag = 1;
}

if (!empty($_POST['btn_submit'])) {
    $pageFlag = 2;
}

?>


<!DOCTYPE html>
<html lang="jp">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>


    <body>
    <!-- <script>alert('haha')</script> -->
    <?php if ($pageFlag === 0) : ?>
        <?php
        if (!isset($_SESSION['csrfToken'])) {
            $csrfToken = bin2hex(random_bytes(32));
            $_SESSION['csrfToken'] = $csrfToken;
        }
        $token = $_SESSION['csrfToken'];

        ?>
        <?php
        if (!empty($errors) && !empty($_POST['btn_confirm'])) : ?>

            <?php echo '<ul>'; ?>
            <?php foreach ($errors as $error) {
                echo '<li>' . $error . '</li>';
            } ?>
            <?php echo '</ul>'; ?>
        <?php endif; ?>

        入力画面
        <div class="container">
            <div class="rơw">
                <div class="col-md-6">
                    <form method="POST" action="input.php">
                        <div class="form-group">
                            <label for="your_name">Name</label>
                            <input type="text" name="your_name" class="form-control" id="your_name"
                                value="<?php
                                        if (!empty($_POST['your_name'])) {
                                            echo checktext($_POST['your_name']);
                                        } ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email"　
                                value="<?php if (!empty($_POST['email'])) {
                                            echo checktext($_POST['email']);
                                        } ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="url">Home page</label>
                            <input type="url" name="url" class="form-control" id="url"　
                                value="<?php if (!empty($_POST['url'])) {
                                            echo checktext($_POST['url']);
                                        } ?>">
                        </div>

                        <div class="form-check form-check-inline">
                            <label for="gender">Sex</label>
                            <input class="form-check-input" type="radio" name="gender" value="0" id="gender1"
                                <?php if (isset($_POST['gender']) && $_POST['gender'] === '0') {
                                    echo 'checked';
                                } ?>>
                            <label class="form-check-label" id="gender1">Male</label>

                            <input class="form-check-input" type="radio" name="gender" value="1" id="gender2"
                                <?php if (isset($_POST['gender']) && $_POST['gender'] === '1') {
                                    echo 'checked';
                                } ?>>
                            <label class="form-check-label" id="gender2">Female</label>
                        </div>

                        <div class="form-group">
                        <label for="age">Age</label>
                            <select class="form-control" id="age" name="age">
                                <option value="">Select</option>
                                <option value="1" <?php if (isset($_POST['age']) && $_POST['age'] === '1') {
                                                        echo 'selected';
                                                    } ?>>++19</option>
                                <option value="2" <?php if (isset($_POST['age']) && $_POST['age'] === '2') {
                                                        echo 'selected';
                                                    } ?>>20-29</option>
                                <option value="3" <?php if (isset($_POST['age']) && $_POST['age'] === '3') {
                                                        echo 'selected';
                                                    } ?>>30-39</option>
                                <option value="4" <?php if (isset($_POST['age']) && $_POST['age'] === '4') {
                                                        echo 'selected';
                                                    } ?>>40-49</option>
                                <option value="5" <?php if (isset($_POST['age']) && $_POST['age'] === '5') {
                                                        echo 'selected';
                                                    } ?>>50-59</option>
                                <option value="6" <?php if (isset($_POST['age']) && $_POST['age'] === '6') {
                                                        echo 'selected';
                                                    } ?>>60++</option>
                            </select>
                        </div>

                        <div class="form-group">
                        <label for="contact">Contact</label>
                            <textarea class="form-control" id="contact" name="contact" rows="4">
                                <?php if (!empty($_POST['contact'])) {
                                    echo checktext($_POST['contact']);
                                } ?>
                            </textarea>
                        </div>

                        <div class="form-check">
                        <input class="form-check-input" id="caution" type="checkbox" name="caution" value="1">
                        <label class="form-check-label" for="caution">Caution check</label> 
                        </div>
                        
                        <input class="btn btn-info" type="submit" name="btn_confirm" value="確認">
                        </div>

                        <input type="hidden" name="csrf" value="<?php echo $token; ?>">
                        <!-- <input type="checkbox" name="sport[]" value="Bong da">Bong da
                        <input type="checkbox" name="sport[]" value="Bong ro">Bong ro
                        <input type="checkbox" name="sport[]" value="Bong chuyen">Bong chuyen -->
                    </form>

                </div> <!-- day la div cho form -->
            </div>
        </div>
    <?php endif; ?>


    <?php
    if ($pageFlag === 1) : ?>
        確認画面
        <?php if ($_POST['csrf'] === $_SESSION['csrfToken']) {
        } ?>
        <form method="POST" action="input.php">
            Name
            <?php echo checktext($_POST['your_name']); ?>
            <br>
            Email
            <?php echo checktext($_POST['email']); ?>
            <br>
            Home page
            <?php echo checktext($_POST['url']); ?>
            <br>
            Sex
            <?php
            if ($_POST['gender'] === '0') {
                echo 'Male';
            }
            if ($_POST['gender'] === '1') {
                echo 'Female';
            }
            ?>
            <br>
            Age
            <?php
            if ($_POST['age'] === '1') {
                echo '++19';
            }
            if ($_POST['age'] === '2') {
                echo '20-29';
            }
            if ($_POST['age'] === '3') {
                echo '30-39';
            }
            if ($_POST['age'] === '4') {
                echo '40-49';
            }
            if ($_POST['age'] === '5') {
                echo '50-59';
            }
            if ($_POST['age'] === '6') {
                echo '60++';
            }
            ?>
            <br>
            Contact
            <?php echo checktext($_POST['contact']); ?>
            <br>
            <input type="submit" name="back" value="戻る">
            <input type="submit" name="btn_submit" value="送信">
            <input type="hidden" name="your_name" value="<?php echo checktext($_POST['your_name']); ?>">
            <input type="hidden" name="email" value="<?php echo checktext($_POST['email']); ?>">
            <input type="hidden" name="url" value="<?php echo checktext($_POST['url']); ?>">
            <input type="hidden" name="gender" value="<?php echo checktext($_POST['gender']); ?>">
            <input type="hidden" name="age" value="<?php echo checktext($_POST['age']); ?>">
            <input type="hidden" name="contact" value="<?php echo checktext($_POST['contact']); ?>">
            <input type="hidden" name="csrf" value="<?php echo checktext($_POST['csrf']); ?>">
            <br>
            <!-- <input type="checkbox" name="sport[]" value="Bong da">Bong da
        <input type="checkbox" name="sport[]" value="Bong ro">Bong ro
        <input type="checkbox" name="sport[]" value="Bong chuyen">Bong chuyen -->
        </form>
    <?php endif; ?>

    <?php if ($pageFlag === 2) : ?>

        <?php if ($_POST['csrf'] === $_SESSION['csrfToken'])  :?>
        <?php require '../mainte/insert.php';
        insertContact($_POST); ?>
        送信が完了しました
        <?php unset($_SESSION['csrfToken']); ?>
    <?php endif; ?>
    <?php endif; ?>
    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

    </body>

</html>