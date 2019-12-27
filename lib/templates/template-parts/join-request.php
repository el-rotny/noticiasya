<?php
/**
 * Template part for Join Modal
 *
 *
 */
?>

<div class="join-request">
  <div class="join-request-backdrop"></div>
  <div class="join-request-box">
    <div class="join-request-close">
      <i class="icon -chevron-left"></i>
    </div>
    <div class="join-request-inner">
      <div class="join-request-container">

        <div class="footer-seperator">
          <hr>
          <div class="footer-seperator-svgwrap">
            Logo Outline
          </div>
        </div>

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
          <form action="/contact" method="post">
            <div class="join-request-title">
              Join the community
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" name="name" maxLength={50} placeholder="Your name" required class="form-input" />
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="email" name="email" maxLength={100} placeholder="Email" required class="form-input" />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-submit">
                  <button type="submit" class="btn -flat -inverse">Join</button>
                </div>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
</div>
