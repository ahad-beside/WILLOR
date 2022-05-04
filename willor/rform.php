<table width="75%" border="0" align="center" cellpadding="10" cellspacing="10" style="background-color: #FFF6D2">
      <tbody>
        <tr >
          <td height="38" colspan="4" align="center"><?php echo isset($msg)?$msg:''; ?></td>
        </tr>
        <tr>
          <td height="39" colspan="4" align="center"><span class="login">Register Account</span><br>
            <span class="register">Please register your account with us to take the benefit of our online e-Account System</span></td>
          </tr>
        <tr>
          <td colspan="4" bgcolor="#E6E7E8" class="topbar" style=" border-radius:10px; border: none;">PERSONAL INFORMATION :</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td width="10%" align="right" class="passacc"><img src="images/person1.png" width="44" height="43" alt=""/></td>
          <td width="19%" class="passacc">FIRST NAME :</td>
          <td width="60%"><input name="firstname" type="text" required class="input-register" id="firstname"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/person1.png" width="44" height="43" alt=""/></td>
          <td><span class="passacc">LAST NAME :</span></td>
          <td><input name="lastname" type="text" required class="input" id="lastname"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/gender.png" width="44" height="43" alt=""/></td>
          <td class="passacc"><label for="gender">GENDER :</label></td>
          <td>
          <select name="gender"  required class="inputselect" id="gender">
            <option value="male" selected="selected">Male</option>
            <option value="Female">Female</option>
          </select>
          
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/birth.png" width="44" height="43" alt=""/></td>
          <td class="passacc"><label for="bdate">DATE OF BIRTH :</label></td>
          <td><input name="bdate" type="date" required class="inputselect" id="bdate" max="2011-01-01" min="1890-01-01" value="2000-01-01"></td>
        </tr>
        
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/phone.png" width="37" height="36" alt=""/></td>
          <td class="passacc"><label for="phone">PHONE NUMBER :</label></td>
          <td><input name="phone" type="number" required class="input" id="phone"></td>
        </tr>
        
        <tr>
          <td>&nbsp;</td>
          <td align="right">&nbsp;</td>
          <td class="passacc"><label for="email">E-MAIL :</label></td>
          <td>
            <input name="email" type="email" class="input" id="email"></td>
        </tr>
        
        
        <tr>
          <td colspan="4" bgcolor="#e6e7e8" class="topbar" style=" border-radius:10px; border: none;">ADDRESS INFORMATION :
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/address.png" width="40" height="39" alt=""/></td>
          <td><label for="address" class="passacc">ADDRESS :</label></td>
          <td><textarea name="address" rows="5" required class="input" id="address"></textarea></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/city.png" width="44" height="43" alt=""/></td>
          <td><label for="city" class="passacc">CITY :</label></td>
          <td><input name="city" type="text" required="required" class="input" id="city"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/circle.png" width="42" height="41" alt=""/></td>
          <td><label for="city" class="passacc">STATE :</label></td>
          <td><input name="state" type="text" required="required" class="input" id="state"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/country.png" width="44" height="43" alt=""/></td>
          <td><label for="city" class="passacc">COUNTRY :</label></td>
          <td><input name="country" type="text" required="required" class="input" id="country"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/zip.png" width="40" height="39" alt=""/></td>
          <td><label for="city" class="passacc">ZIPCODE :</label></td>
          <td><input name="zip" type="text" required="required" class="input" id="zip"></td>
        </tr>
        <tr>
          <td colspan="4" bgcolor="#E6E7E8" style=" border-radius:10px; border: none;"><span class="topbar" >ACCOUNT INFORMATION : </span></td>
          </tr>
        <tr>
          <td class="passacc">&nbsp;</td>
          <td align="right" class="passacc"><img src="images/acc.png" width="44" height="43" alt=""/></td>
          <td class="passacc"><label for="accounttype">ACCOUNT TYPE :</label></td>
          <td><p>
            <select name="accounttype" size="1" required class="inputselect" id="accounttype">
              <option>DOLLAR ACCOUNT</option>
              <option>EURO ACCOUNT</option>
          </select>
            <br>
          </p></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/accno.png" width="41" height="40" alt=""/></td>
          <td class="passacc">PROFILE PICTURE UPLOAD :</td>
          <td><input name="pics" type="file" required="required" class="inputselect" id="pics"></td>
        </tr>
        <tr>
          <td colspan="4" bgcolor="#E6E7E8" class="topbar" style=" border-radius:10px; border: none;">SECURITY :</td>
          </tr>
        <tr>
          <td align="right"></td>
          <td align="right"><img src="images/passx.png" width="44" height="43" alt=""/></td>
          <td><label for="password" class="passacc">PASSWORD :</label></td>
          <td><input name="password" type="password" required="required" class="inputselect" id="password"></td>
        </tr>
        <tr>
          <td align="right"></td>
          <td align="right"><img src="images/dots.png" width="44" height="43" alt=""/></td>
          <td><label for="password" class="passacc">CONFIRM PASSWORD :</label></td>
          <td><input name="confirmpassword" type="password" required="required" class="inputselect" id="password"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/pin.png" width="44" height="43" alt=""/></td>
          <td ><label for="password" class="passacc">PIN :</label></td>
          <td><input name="pin" type="password" required class="inputselect" id="pin" maxlength="4"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/dots.png" width="44" height="43" alt=""/></td>
          <td><label for="password" class="passacc">CONFIRM PIN :</label></td>
          <td><input name="confirmpin" type="password" required class="inputselect" id="confirmpin" maxlength="4"></td>
        </tr>
        <tr>
          <td width="11%">&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td class="normal">Make sure you fill out all the fields needed to setup your account.</td>
        </tr>
        
        <tr>
        
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td><button class="button" name="submit">Register Now</button</td>
          </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
 