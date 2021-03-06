
	<div class="container-contact100">

		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="models/mailcontact.php" method="POST">
				<span class="contact100-form-title">
					Send Us An E-mail
				</span>

				<?php
                  // Ispis uspeha!
                  if(isset($_SESSION['greska'])){
                    echo "Uspesno ste se registrovali!";
                  }
                  unset($_SESSION['greska']);
            	?>

				<label class="label-input100" for="first-name">Tell us your Name *</label>
				<div class="wrap-input100 validate-input" data-validate = "Type first name">
					<input id="first-name" class="input100" type="text" name="first-name" placeholder="First name">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="email">Enter your email *</label>
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input id="email" class="input100" type="text" name="email" placeholder="example@email.com">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="phone">Subject</label>
				<div class="wrap-input100">
					<input id="phone" class="input100" type="text" name="subject" placeholder="Work suggestion">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="message">Message *</label>
				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<textarea id="message" class="input100" name="message" placeholder="Write us a message"></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn taster" name="dugme">
						Send E-mail
					</button>
				</div>
			</form>

			<div class="contact100-more flex-col-c-m bgpic">
				<div class="flex-w size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-map-marker"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Address
						</span>

						<span class="txt2">
							Beogradska bb, 11000, Belgrade, Serbia
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-phone-handset"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Lets Talk
						</span>

						<span class="txt3">
							+381 00 00 00 000
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-envelope"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							General Support
						</span>

						<span class="txt3">
							fooseshoesbg@gmail.com
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

