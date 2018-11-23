<?php require 'config.php'; ?>
<?php require 'partials/header.php'; ?>

<?php
    $user = ( object ) array( 'firstname' => 'Tanguy', 'lastname' => 'Scholtes', 'id' => 1 );
    $message = ( object ) array( 'content' => 'Emojis... Emojis everywhere...', 'timestamp' => '23-11-18 16:16', 'id' => 1, 'author' => $user );
?>

<main id="content">
    <h1 class="content-title">Index</h1>

    <p><?php echo $message -> timestamp; ?> <?php echo $message -> author -> firstname; ?> <?php echo $message -> author -> lastname; ?> > <?php echo $message -> content; ?></p>

    <?php
        //display all reactions of Message based on ID of the message
        $react = new Reaction();
        $reactions = $react -> getAllReactionsOfMessage( $message -> id );
        if ( $reactions ):
    ?>
        <div class="reactions-wrapper">
            <?php foreach ( $reactions as $reaction ): ?>
                <form class="inline-form" method="post" action="deleteReaction.php">
                    <input type="hidden" id="delete-id" name="delete-id" value="<?php echo $reaction -> id; ?>" />
                    <button type="submit"><?php echo $reaction -> emoji; ?></button>
                </form>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="post" action="createReaction.php">
        <label for="create-emoji">Add reaction</label>
        <p class="emoji-picker-container">
            <input type="hidden" id="create-user-id" name="create-user-id" value="<?php echo $user -> id; ?>" />
            <input type="hidden" id="create-message-id" name="create-message-id" value="<?php echo $message -> id; ?>" />
            <input id="create-emoji" name="create-emoji" type="text" data-emojiable="true" data-emoji-input="unicode" maxlength="1" />
        </p>
        <button type="submit">React !</button>
    </form>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="lib/emoji-picker/js/config.js"></script>
<script src="lib/emoji-picker/js/util.js"></script>
<script src="lib/emoji-picker/js/jquery.emojiarea.js"></script>
<script src="lib/emoji-picker/js/emoji-picker.js"></script>

<script>
        // Initializes and creates emoji set from sprite sheet
        window.emojiPicker = new EmojiPicker( {
            emojiable_selector: '[data-emojiable=true]',
            assetsPath: '../lib/emoji-picker/img/',
            popupButtonClasses: 'fa fa-smile-o'
        } );
        // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
        // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
        // It can be called as many times as necessary; previously converted input fields will not be converted again
        window.emojiPicker.discover();
</script>

<?php require 'partials/footer.php'; ?>
