<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>PetCollars</title>
    <link rel="stylesheet" href="./css/infostyle.css">
</head>

<body class="wrapper">
    <div class="navbar">
        <li><a href="#">МОЇ УЛЮБЛЕНЦІ</a></li>
        <li><a class="choosen" href="#">ІНФОРМАЦІЯ</a></li>
        <li><a href="/security.php">БЕЗПЕКА</a></li>
        <li><a href="/index.php">ГОЛОВНА</a></li>
    </div>
    <div class="menu">
        <div class="profile-menu">
            <form class="confirm" action="script/change info.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $_SESSION['user']['id'] ?>">
                <label>PROFILE'S PHOTO</label>
                <div class="foto">
                    <img src="<?= $_SESSION['user']['avatar'] ?>" alt="">
                    <div class="change_foto">
                        <label>CHANGE PHOTO</label>
                        <input type="file" name="avatar">
                    </div>
                </div>
                <label>FULL NAME</label>
                <input type="text" name="full_name" placeholder="*missing*" value="<?= $_SESSION['user']['full_name'] ?>">
                <label>TELEGRAM</label>
                <input type="text" name="telegram" placeholder="*missing*" value="<?= $_SESSION['user']['telegram'] ?>">
                <label>INSTAGRAM</label>
                <input type="text" name="instagram" placeholder="*missing*" value="<?= $_SESSION['user']['instagram'] ?>">
                <div class="birthday-area">
                    <label>DATE OF BIRTH</label>
                    <div class="birthday">
                        <div class="day-area">
                            <label>DAY</label>
                            <select class="day" name="day">
                                <option><?= $_SESSION['user']['day'] ?></option>
                                <option>01</option>
                                <option>02</option>
                                <option>03</option>
                                <option>04</option>
                                <option>05</option>
                                <option>06</option>
                                <option>07</option>
                                <option>08</option>
                                <option>09</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                                <option>17</option>
                                <option>18</option>
                                <option>19</option>
                                <option>20</option>
                                <option>21</option>
                                <option>22</option>
                                <option>23</option>
                                <option>24</option>
                                <option>25</option>
                                <option>26</option>
                                <option>27</option>
                                <option>28</option>
                                <option>29</option>
                                <option>30</option>
                                <option>31</option>
                            </select>
                        </div>
                        <div class="month-area">
                            <label>MONTH</label>
                            <select class="month" name="month">
                                <option><?= $_SESSION['user']['month'] ?></option>
                                <option>Січень</option>
                                <option>Лютий</option>
                                <option>Березень</option>
                                <option>Квітень</option>
                                <option>Травень</option>
                                <option>Червень</option>
                                <option>Липень</option>
                                <option>Серпень</option>
                                <option>Вересень</option>
                                <option>Жовтень</option>
                                <option>Листопад</option>
                                <option>Грудень</option>
                            </select>
                        </div>
                        <div class="year-area">
                            <label>YEAR</label>
                            <select class="year" name="year">
                                <option><?= $_SESSION['user']['year'] ?></option>
                                <option>1960</option>
                                <option>1961</option>
                                <option>1962</option>
                                <option>1963</option>
                                <option>1964</option>
                                <option>1965</option>
                                <option>1966</option>
                                <option>1967</option>
                                <option>1968</option>
                                <option>1969</option>
                                <option>1970</option>
                                <option>1971</option>
                                <option>1972</option>
                                <option>1973</option>
                                <option>1974</option>
                                <option>1975</option>
                                <option>1976</option>
                                <option>1977</option>
                                <option>1978</option>
                                <option>1979</option>
                                <option>1980</option>
                                <option>1981</option>
                                <option>1982</option>
                                <option>1983</option>
                                <option>1984</option>
                                <option>1985</option>
                                <option>1986</option>
                                <option>1987</option>
                                <option>1988</option>
                                <option>1989</option>
                                <option>1990</option>
                                <option>1991</option>
                                <option>1992</option>
                                <option>1993</option>
                                <option>1994</option>
                                <option>1995</option>
                                <option>1996</option>
                                <option>1997</option>
                                <option>1998</option>
                                <option>1999</option>
                                <option>2000</option>
                                <option>2001</option>
                                <option>2002</option>
                                <option>2003</option>
                                <option>2004</option>
                                <option>2005</option>
                                <option>2006</option>
                                <option>2007</option>
                                <option>2008</option>
                                <option>2009</option>
                                <option>2010</option>
                                <option>2011</option>
                            </select>
                        </div>
                    </div>
                </div>
                <label class="msg-label">CONFIRM CHANGES</label>
                <input type="password" name="password_confirm" placeholder="ENTER YOUR CURRENT PASSWORD">
                <?php if (isset($_SESSION['msgtrue'])) {
                    echo '<p class = "msgtrue">' . $_SESSION['msgtrue'] . '</p>';
                } else if (isset($_SESSION['msg'])) {
                    echo '<p class = "msg">' . $_SESSION['msg'] . '</p>';
                }
                unset($_SESSION['msg']);
                unset($_SESSION['msgtrue']);
                ?>
                <button type="submit" class="confirm-button" name="confirm">CONFIRM</button>
            </form>
        </div>
    </div>
</body>

</html>