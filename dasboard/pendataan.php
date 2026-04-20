<card class="from-warga">
	<label>Nama Kepala Keluarga</label>
				<td>Nama Kepala Keluarga</td>
				<td>
					
					<input type="text"onkeydown="preventNumberInput(event)" onkeyup="preventNumberInput(event)" name="nama_kepala_keluarga" placeholder="Enter Name">
				</td>					
			</tr>	
			<tr>
				<td>Blok Perumahan</td>
				<td><input type="text" name="blok" placeholder="Enter Blok"	>				
			</tr>	
			<tr>
				<td>Nama Jalan Perumahan</td>
				<td><input type="text" name="jalan" placeholder="Enter Jalan">				
			</tr>	
			<tr>
			<td>Nomer Handphone</td>
				<td><input type="tel" name="handphone" placeholder="Enter number handphone">		
			</tr>	
			<tr>			
				<td><input type="submit" name="simpan" value="simpan"></td>
							
			</tr>				
		
	</form>
</body>
<script>
    function preventNumberInput(e) {
      var keyCode = (e.keyCode ? e.keyCode : e.which);
      if (keyCode > 47 && keyCode < 58 || keyCode > 95 && keyCode < 107) {
        e.preventDefault();
      }
    }

    $(document).ready(function() {
      $('#text_field').keypress(function(e) {
        preventNumberInput(e);
      });
    })
  </script>
</html>







