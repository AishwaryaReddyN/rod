<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<div id="chatBox" class="rounded">
    <div class="text-center primaryBack text-white rounded-top py-3">
        <h6 class="m-0"><i class="fa-regular fa-comment me-2"></i>Ask a Question</h6>
    </div>
    <div id="chatBotBody">
        <div class="botMessage">

            <p class="m-0">Hi, How can I help you?</p>
        </div>
    </div>
    <div>
        <div class="input-group">
            <input type="text" id="queryMessage" class="form-control" required placeholder="Type your message here"
                aria-label="Type your message here" aria-describedby="button-addon2">
            <button class="btn btn-danger" type="button" id="chatQuery">
                <i class="fa-solid fa-location-arrow"></i></button>
        </div>
    </div>
</div>

<!-- Icon -->
<div class="chatIcon text-center d-flex align-items-center justify-content-center" onclick="showChatBox()">
    <i class="fa-regular fa-comment" id="chatOpenIcon"></i>
    <i class="fa-solid fa-xmark" id="chatCloseIcon"></i>
</div>

<script>
    $(document).ready(function () {
        $("#chatQuery").on("click", function () {
            $chatQuery = $("#queryMessage").val();
            if ($chatQuery) {
                $askedQuestion = '<div class="userMessageContainer d-flex justify-content-end"><div class="userMessage"><small class="d-block text-white-50"><?php echo isset($_SESSION['username']) ? ucwords($_SESSION['username']) : 'Anonymous' ?></small><p class="m-0">' + $chatQuery + '</p></div></div>';
                $("#chatBotBody").append($askedQuestion);
                $("#queryMessage").val('');

                $.ajax({
                    url: '<?php echo $_ENV['BASE_DIR'] . "/model/chatbotModel.php" ?>',
                    type: 'POST',
                    data: 'queryMessage=' + $chatQuery,
                    success: function (queryAnswer) {
                        $reply = '<div class="botMessage"><p class="m-0">' + queryAnswer + '</p></div>';
                        $("#chatBotBody").append($reply);
                        $("#chatBotBody").scrollTop($("#chatBotBody")[0].scrollHeight);
                    }
                });
            }
        });
    });
</script>