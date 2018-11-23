<?php require 'config.php'; ?>
<?php require 'partials/header.php'; ?>

<?php
//create new object to use object-specific method
$react = new Reaction();

//Quick & dirty reaction save
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && $_REQUEST[ 'action' ] == 'create' ) {
    //if the page is requested using the POST method (result of the form submission as it is defined with method="post")
    //AND if the query string has a variable "action" with value "create"
    $saved = $react -> create( 1, 1, $_POST[ 'create-emoji' ] ); //note that with these params, reaction will always be by User of ID 1 & linked to Message of ID 1
}

//Quick & dirty reaction edit
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && $_REQUEST[ 'action' ] == 'update' && isset( $_REQUEST[ 'id' ] ) ) {
    $updated = $react -> update( $_REQUEST[ 'id' ], $_POST[ 'update-author' ], $_POST[ 'update-message' ], $_POST[ 'update-emoji' ] );
}

//Quick & dirty reaction delete
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && $_REQUEST[ 'action' ] == 'delete' && isset( $_REQUEST[ 'id' ] ) ) {
    $deleted = $react -> delete( $_REQUEST[ 'id' ] );
}
?>

<main id="content">
    <h1 class="content-title">Index</h1>

    <p>Emojis... Emojis everywhere...</p>

    <?php if ( $_SERVER[ 'REQUEST_METHOD' ] == 'GET' && isset( $_REQUEST[ 'action' ] ) && $_REQUEST[ 'action' ] == 'update' && isset( $_REQUEST[ 'id' ] ) ): ?>
        <?php $toUpdate = $react -> getReaction( $_REQUEST[ 'id' ] ); ?>
        <form method="post" action="index.php?action=update&id=<?php echo $toUpdate -> id; ?>">
            <label for="update-emoji">Edit reaction</label>
            <p class="emoji-picker-container">
                <input id="update-emoji" name="update-emoji" type="text" data-emojiable="true" data-emoji-input="unicode" maxlength="1" value="<?php echo $toUpdate -> emoji; ?>" />
            </p>
            <input type="hidden" id="update-author" name="update-author" value="<?php echo $toUpdate -> author_id; ?>" />
            <input type="hidden" id="update-message" name="update-message" value="<?php echo $toUpdate -> message_id; ?>" />
            <button type="submit">Edit</button>
        </form>
    <?php else: ?>
        <form method="post" action="index.php?action=create">
            <label for="create-emoji">Add reaction</label>
            <p class="emoji-picker-container">
                <input id="create-emoji" name="create-emoji" type="text" data-emojiable="true" data-emoji-input="unicode" maxlength="1" />
            </p>
            <button type="submit">React !</button>
        </form>
    <?php endif; ?>

    <?php
        //display all reactions of Message of ID 1
        $reactions = $react -> getAllReactionsOfMessage( 1 ); ?>
    <?php if ( $reactions ): ?>
        <ul>
            <?php foreach ( $reactions as $reaction ): ?>
                <li>
                    <?php echo $reaction -> emoji; ?>
                    <a href="index.php?action=update&id=<?php echo $reaction -> id; ?>"><span class="fas fa-edit"></span></a>
                    <form method="post" action="index.php?action=delete&id=<?php echo $reaction -> id; ?>">
                        <button type="submit"><span class="fas fa-trash"></span></button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No reaction to display.</p>
    <?php endif; ?>
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
