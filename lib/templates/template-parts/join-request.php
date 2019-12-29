<?php
/**
 * Template part for Join Modal
 *
 */
?>

<div class="join-request">
  <div class="join-request-backdrop"></div>
  <div class="join-request-box">
    <div class="join-request-close">
      <div class="animated-menu-icon -active">
        <div class="animated-menu-icon-bar"></div>
        <div class="animated-menu-icon-bar"></div>
        <div class="animated-menu-icon-bar"> </div>
      </div>
    </div>
    <div class="join-request-inner">
      <div class="join-request-container">
        <div class="join-request-message -success">
          <div class="join-request-message-body">
            <!-- Success Gets Appended Here -->
          </div>
          <div class="join-request-message-controls">
            <button type="button" class="btn -flat -inverse">Close</button>
          </div>
        </div>
        <div class="join-request-message -error">
          <div class="join-request-message-body">
            <!-- Error Gets Appended Here -->
          </div>
          <div class="join-request-message-controls">
            <button type="button" class="btn -flat -inverse">Back</button>
          </div>
        </div>

        <div class="join-request-form">
          <div class="join-request-title">
            <?php $title_field = get_field('form_title', 'option');
             echo !$title_field == NULL ? $title_field : 'Mantente Informado';
            ?>
          </div>
          <?php if ( is_active_sidebar( 'newsletter-form' ) ) { ?>
              <?php dynamic_sidebar( 'newsletter-form' ); ?>
          <?php } else { ?>
            <form class="icontact-signup-teaser-form" action="https://noticiasya.com/newsletter-subscription/">
              <input class="icontact-signup-teaser-name" type="text" name="name" maxLength={50} placeholder="Your name" required />
        			<input class="icontact-signup-teaser-email" type="email" maxLength={100} placeholder="Email" required/>
        			<button type="submit" class="btn -flat btn--black join-request-form-submit">Únete</button>
        		</form>
          <?php } ?>

          <div class="text-center">
            <p>
              <small>
                <?php $title_field = get_field('contact_email', 'option');
                 echo !$title_field == NULL ? $title_field : 'service@noticiasya.com';
                ?>
                <br/>
                <?php $title_field = get_field('contact_number', 'option');
                 echo !$title_field == NULL ? $title_field : '(213) 247-4523';
                ?>
                <br/>
                <?php $title_field = get_field('hours_of_operation', 'option');
                 echo !$title_field == NULL ? $title_field : 'M – F, 9:00 AM – 5:00 PM PST';
                ?>
              </small>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
