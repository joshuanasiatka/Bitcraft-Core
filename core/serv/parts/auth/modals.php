
  <!-- Help Modal -->
  <div id="forgot" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Forgot Password?</h4>
        </div>
        <div class="modal-body">
          <form id='resetreq' class="col-md-12" action='' method='post' accept-charset='UTF-8'>
            <p>If you forgot your password, enter the email address associated with your account to reset it. A password reset link will be sent to that account.</p>
            <input type='hidden' name='submitted_pass' id='submitted_pass' value='1'/>
            <div class="form-group">
                <input type='text' name='email' class="form-control input-lg" id='email' value='' placeholder="Email Address" />
                <span id='resetreq_email_errorloc' class='error'></span>
            </div>
            <div class="form-group">
                <button name='Submit' type='submit' class="btn btn-primary btn-lg btn-block">Reset Password</button>
            </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
