<?php
  include 'inc/header.php';
 ?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="hello" method="get" id="member">
                	<input name="Domain" type="text" value="Username" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
                    <input name="Domain" type="password" value="Password" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
                 </form>
                 <p class="note"><a href="#">Forgot passoword </a></p>
                    <div class="buttons"><div><button class="grey">Sign In</button></div></div>
                    <br>
                   <br>
                    </div>

    	<div class="register_account">
    		<h3>Register New Account</h3>
    		<form>
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="Name" placeholder="Enter name..." >
							</div>
							<div>
								<input type="text"  name="E-Mail" placeholder="Enter E-Mail...">
							</div>
		    			 </td>
		    			<td>       
		           <div>
		          <input type="text" name="phone" placeholder="Enter phone...">
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder="Enter password...">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input type ="submit" name="submit" value="Creat ccount" class="grey"></div></div>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
  include 'inc/footer.php';
 ?>
