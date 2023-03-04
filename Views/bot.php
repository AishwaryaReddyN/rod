<?php
include "../baseConfig.php";
include $absoluteDir . "views/components/header.php";
include $absoluteDir . "views/components/navbar.php";
include $absoluteDir . "controller/userController.php";
// include $absoluteDir . "views/message.php";
?>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<div class="container rounded p-3 my-5">
    <h3>FAQS</h3>
    <div class="form border border-dark rounded p-3">
        <div class="bot-inbox inbox">
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="msg-header">
                <p>Hello there, how can I help you?</p>
            </div>
        </div>
    </div>
    <div class="typing-field">
        <div class="input-data">
            <input id="queryMessage" class="form-control my-2" type="text" placeholder="Type something here.." required>
            <button id="faqQuery" class="btn btn-outline-dark">Send</button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#faqQuery").on("click", function () {
            $value = $("#queryMessage").val();
            $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div></div>';
            $(".form").append($msg);
            $("#queryMessage").val('');
            console.log($value);

            // start ajax code
            $.ajax({
                url: '<?php include $absoluteDir . "views/message.php" ?>',
                type: 'POST',
                data: 'text' + $value,
                success: function (result) {
                    $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + result + '</p></div></div>';
                    $(".form").append($replay);
                    // when chat goes down the scroll bar automatically comes to the bottom
                    $(".form").scrollTop($(".form")[0].scrollHeight);
                }
            });
        });
    });
</script>

<?php include $absoluteDir . "views/components/footer.php"; ?>