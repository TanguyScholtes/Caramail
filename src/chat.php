<?php require 'config.php'; ?>
<?php require 'partials/header.php'; ?>

<?php
    $url = explode( "/", __FILE__ );
    $currentPage = "";
    for ( $i = 4; $i < count( $url ); $i++ ) {
        $currentPage .= $url[ $i ];
    }

    $_SESSION[ 'user' ] = ( object ) array( 'firstname' => 'Tanguy', 'lastname' => 'Scholtes', 'id' => 1 );

    $users = [
        ( object ) array( 'firstname' => 'Tanguy', 'lastname' => 'Scholtes', 'id' => 1 ),
        ( object ) array( 'firstname' => 'Julie', 'lastname' => 'Vanderbyse', 'id' => 2 )
    ];
    $messages = [
        ( object ) array( 'content' => 'Emojis... Emojis everywhere...', 'timestamp' => '23-11-2018 16:16', 'id' => 1, 'author' => $users[ 0 ] ),
        ( object ) array( 'content' => 'This is message two. Wazzup ?', 'timestamp' => '26-11-2018 11:27', 'id' => 2, 'author' => $users[ 1 ] ),
        ( object ) array( 'content' => 'WAZZZZZAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 'timestamp' => '26-11-2018 12:22', 'id' => 3, 'author' => $users[ 0 ] )
    ];
?>

<main id="content">
    <h1 class="content-title">Index</h1>

    <?php if ( $messages ): ?>
        <?php foreach ( $messages as $message ): ?>
            <p><?php echo $message -> timestamp; ?> <?php echo $message -> author -> firstname; ?> <?php echo $message -> author -> lastname; ?> > <?php echo $message -> content; ?></p>
            <div class="reactions-wrapper">
                <form class="inline-form" method="post" action="createReaction.php?page=<?php echo $currentPage; ?>" name="reactionCreate<?php echo $message -> id; ?>">
                    <p class="emoji-picker-container">
                        <input type="hidden" name="reaction-create-user-id" value="<?php echo $_SESSION[ 'user' ] -> id; ?>" />
                        <input type="hidden" name="reaction-create-message-id" value="<?php echo $message -> id; ?>" />
                        <input class="reaction-emoji-input" name="reaction-create-emoji" type="text" data-emojiable="true" data-emoji-input="unicode" maxlength="1" oninput="document.forms[ 'reactionCreate<?php echo $message -> id; ?>' ].submit()" />
                    </p>
                </form>
                <?php
                    // display all reactions of Message based on ID of the message
                    $react = new Reaction();
                    $reactions = $react -> getAllReactionsOfMessage( $message -> id );
                    if ( $reactions ):
                ?>
                    <?php foreach ( $reactions as $reaction ): ?>
                        <form class="inline-form" method="post" action="deleteReaction.php?page=<?php echo $currentPage; ?>">
                            <input type="hidden" name="reaction-delete-id" value="<?php echo $reaction -> id; ?>" />
                            <?php foreach ( $users as $user ){
                                    if ( $user -> id == $reaction -> author_id ) {
                                        $reaction -> author = $user;
                                    }
                                }
                             ?>
                            <?php if ( $reaction -> author -> id == $_SESSION[ 'user' ] -> id ): ?>
                                <button class="emoji-button" type="submit" title="<?php echo $reaction -> author -> firstname; ?> <?php echo $reaction -> author -> lastname; ?>">
                                    <?php echo $reaction -> emoji; ?>
                                </button>
                            <?php else: ?>
                                <span title="<?php echo $reaction -> author -> firstname; ?> <?php echo $reaction -> author -> lastname; ?>">
                                    <?php echo $reaction -> emoji; ?>
                                </span>
                            <?php endif; ?>
                        </form>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No message yet. Write one !</p>
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

    // Add a hover tooltip (via title HTML attribute) to each reaction emoji selector
    Array.from( document.querySelectorAll( '.emoji-picker-icon' ) ).forEach( function ( element ) {
        element.setAttribute( "title", "Add reaction…" );
    } );
</script>

<?php require 'partials/footer.php'; ?>
