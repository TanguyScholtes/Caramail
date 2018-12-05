<?php require 'partials/header.php'; ?>
<?php require 'partials/menu.php'; ?>

<?php var_dump( password_hash( 'chibro', PASSWORD_DEFAULT ) ); ?>

<div class="wrapper">
    <div id="left-column">
        <?php if ( $users ): ?>
            <ul class="users-list">
                <?php foreach( $users as $user ): ?>
                    <li><a href=""><img class="user-avatar" src="<?php echo $user -> avatar; ?>" /><?php echo $user -> firstname; ?> <?php echo $user -> lastname; ?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No user to display</p>
        <?php endif; ?>
    </div>

    <main id="content">
        <h1 class="content-title">
            <?php echo $conversation -> subject; ?>
            <?php if ( $conversation -> slug != "general" ): ?>
                <span id="conversation-subject">by <?php echo $conversation -> author -> firstname; ?> <?php echo $conversation -> author -> lastname; ?></span>
            <?php endif; ?>
        </h1>

        <?php if ( $messages ): ?>
            <?php foreach ( $messages as $message ): ?>
                <div class="message">
                    <img class="message-user-avatar" src="<?php echo $message -> author -> avatar; ?>" />
                    <span class="message-timestamp"><?php echo $message -> timestamp; ?></span>
                    <span class="message-author"><?php echo $message -> author -> firstname; ?> <?php echo $message -> author -> lastname; ?></span>
                    <?php if ( $message -> author -> id == $_SESSION[ 'user' ] -> id ): ?>
                        <div class="message-controls">
                            <a class="message-edit" href=""><span class="fas fa-pen"></a>
                            <a class="message-delete" href=""><span class="fas fa-times"></span></a>
                        </div>
                    <?php endif; ?>
                    <div class="message-content-wrapper">
                        <p class="message-content"><?php echo $message -> content; ?></p>
                    </div>

                    <div class="reactions-wrapper">
                        <form class="inline-form add-reaction" method="post" action="createReaction.php?page=<?php echo $currentPage; ?>" name="reactionCreate<?php echo $message -> id; ?>">
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
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No message yet. Write one !</p>
        <?php endif; ?>
        <div class="new-message">
            <form class="new-message-form" method="post" action="">
                <label for="new-message-image" class="new-message-image-label">
                    <input id="new-message-image" type="file" name="new-message-image" />
                </label>
                <p class="new-message-content-wrapper">
                    <input class="new-message-content" name="new-message-content" type="text" data-emojiable="true" data-emoji-input="unicode" />
                </p>
                <button class="button-image" type="submit">
                    <img src="images/bouton-send-resize.png" alt="Send" />
                </button>
            </form>
        </div>
    </main>
</div>

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
    Array.from( document.querySelectorAll( '.reactions-wrapper .emoji-picker-icon' ) ).forEach( function ( element ) {
        element.setAttribute( "title", "Add reaction…" );
    } );
</script>

<?php require 'partials/footer.php'; ?>
