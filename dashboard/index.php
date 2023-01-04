<?php require '../app/session.php' ?>
<?php require 'dash_layout/dash_header.php' ?>
<?php require '../app/database/connection.php' ?>

<style>
    @import url("https://fonts.googleapis.com/css?family=Roboto&display=swap");

    @keyframes turnDial {
        from {
            transform: translate(-50%, -50%) rotate(0deg);
        }

        to {
            transform: translate(-50%, -50%) rotate(360deg);
        }
    }

    .phone {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        font-family: "Roboto", sans-serif;
        color: #5c5e6a;

        width: 320px;
        height: 568px;
        border-radius: 3rem;
        padding: 2rem;

    }

    /*
Masthead
*/

    .masthead {
        display: flex;
        align-items: top;
        justify-content: space-between;
    }

    .masthead h3 {
        font-weight: 600;
        letter-spacing: 0.25px;
        margin: 0 0 0.25rem;
    }

    .masthead .status {
        display: inline-block;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
    }

    .masthead .status:before {
        display: inline-block;
        content: "";
        height: 0.5rem;
        width: 0.5rem;
        background: #90fdca;
        border-radius: 50%;
        margin-right: 0.5rem;
    }

    .menu-icon {
        height: 3rem;
        width: 3rem;
        border-radius: 0.75rem;
        box-shadow: -1px 2px 6px 0 rgba(0, 21, 65, 0.14),
            0 10px 20px 8px rgba(0, 21, 65, 0.05),
            inset 0 -5px 20px 0 rgba(173, 186, 204, 0), inset 0 4px 7px 1px #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .menu-icon .dot {
        position: relative;
        border-radius: 0.25rem;
        display: block;
        background: #5c5e6a;
        height: 0.4rem;
        width: 0.4rem;
    }

    .menu-icon .dot:nth-of-type(2) {
        margin: 0.15rem 0;
    }

    .menu-icon .dot:before,
    .menu-icon .dot:after {
        position: absolute;
        display: inline-block;
        content: "";
        height: 0.4rem;
        width: 0.4rem;
        background: #5c5e6a;
        border-radius: 50%;
    }

    .menu-icon .dot:before {
        right: 0.55rem;
    }

    .menu-icon .dot:after {
        left: 0.55rem;
    }

    /*
Dial
*/
    .dial-container {
        position: relative;
        margin: auto;
        width: 90%;
        padding-top: 90%;
    }

    .dial {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 100%;
        background: #f5f5fe;
        border-radius: 50%;
        box-shadow: -1px 2px 6px 0 rgba(0, 21, 65, 0.14),
            0 10px 20px 8px rgba(0, 21, 65, 0.05);

        animation-duration: 10s;
        animation-name: turnDial;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
    }

    .dial:before {
        content: "";
        position: absolute;
        background: red;
        top: 0.5rem;
        left: 50%;
        transform: translateX(-50%);
        padding-top: calc(25% - 1rem);
        width: calc(25% - 1rem);
        border-radius: 50%;
        background: #e4e3ef;
        box-shadow: inset 0 -5px 20px 0 rgba(173, 186, 204, 0);
    }

    .dial-container .internal {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: blue;
        width: 50%;
        height: 50%;
        border-radius: 50%;
        background: rgb(160, 55, 221);
        background: linear-gradient(165deg,
                rgba(160, 55, 221, 1) 0%,
                rgba(20, 215, 213, 1) 100%);
    }

    .dial-container .internal .value {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 2.5rem;
        color: #fff;
        text-align: center;
    }

    .dial-container .internal .value:after {
        content: "˚";
        position: absolute;
        top: 0.25rem;
        left: calc(100% - 0.15rem);
    }

    /*
Footer
*/
    footer {
        background: #e4e3ef;
        padding: 1.5rem 0;
        display: flex;
        align-items: center;
        justify-content: space-around;
        border-radius: 1rem;
        box-shadow: inset 0 -5px 20px 0 rgba(173, 186, 204, 0);
    }

    footer .stat {
        text-align: center;
    }

    footer .stat label {
        display: block;
        text-transform: uppercase;
        font-size: 0.5rem;
        letter-spacing: 1.5px;
        color: #b7b5c4;
        margin-bottom: 0.25rem;
    }

    footer .stat span {
        display: block;
        font-size: 1.5rem;
        font-weight: bold;
        position: relative;
    }

    footer .stat span:after {
        content: "˚";
        position: absolute;
        top: 0.15rem;
        right: -0.05rem;
        font-size: 2rem;
    }

    /* Sibling Selectors */
    footer .stat+.stat span:after {
        content: "%";
        top: 0.075rem;
        font-size: 1rem;
    }
</style>


<?php

$jsonurl = "https://api.openweathermap.org/data/2.5/weather?q=kutahya&units=metric&lang=tr&appid=f648c50e66d18646dfc9341d3774dfe7";
$json = file_get_contents($jsonurl);

?>


<div class="phone">
    <!--     Masthead -->
    <div class="masthead">
        <header>
            <h2>Today's Weather</h2>
            <span class="status">Connected</span>
        </header>
        <div class="menu-icon">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>
    <!--   Dial   -->
    <div class="dial-container">
        <div class="dial">
        </div>
        <div class="internal">
            <div class="value">
                <?php echo (json_decode($json)->{'main'}->{'temp'}); ?>
            </div>
        </div>
    </div>
    <!--     Footer -->
    <footer>
        <div class="stat">
            <label>Feels Like</label>
            <span>
                <?php             

                if(strlen(json_decode($json)->{'main'}->{'feels_like'}) > 3 ){
                    $uzunluk = strlen(json_decode($json)->{'main'}->{'feels_like'})-3;
                    echo substr(json_decode($json)->{'main'}->{'feels_like'}, 0, -$uzunluk);
                }else{
                    echo json_decode($json)->{'main'}->{'feels_like'};
                }                
                
                ?>
            </span>
        </div>
        <div class="stat">
            <label>Humidity</label>
            <span> <?php echo json_decode($json)->{'main'}->{'humidity'}; ?></span>
        </div>
    </footer>
</div>


<?php include 'dash_layout/dash_footer.php'; ?>