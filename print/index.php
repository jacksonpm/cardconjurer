<?php
$title = 'Print Page Setup';
$desc = 'Upload card images and download a fully prepared page for printing';
include('../globalHTML/header-1.php');
?>
    <h2 class='readable-background header-extension title center margin-bottom-large'>Printing Tool</h2>
    <div class='readable-background padding layer margin-bottom-large'>
		<h4 class='center padding margin-bottom'>Configure Page Settings</h4>
		<h5 class='margin-bottom padding input-description'>Select your paper size</h5>
		<select onchange='setPageSize(this.value.split(","));' class='input margin-bottom'>
			<option value='8.5,11'>Regular (8.5 by 11)</option>
			<option value='8.2667,11.6934'>A4</option>
		</select>
        <h5 class='margin-bottom padding input-description'>Select your card size</h5>
        <select onchange='setCardSize(this.value.split(","));' class='input margin-bottom'>
            <option value='2.5,3.5'>2.5 x 3.5 Inches</option>
            <option value='2.74,3.74'>2.74 x 3.74 Inches</option>
            <option value='2.75,3.75'>2.75 x 3.75 Inches</option>
            <option value='2.48031,3.46457'>63 x 88 mm</option>
        </select>
        <h5 class='margin-bottom padding input-description'>Toggle the paper orientation (Portrait / Landscape)</h5>
        <button onclick='changeOrientation();' class='input margin-bottom'>Toggle orientation</button>
        <h5 class='margin-bottom padding input-description'>Include cutting aids (black background and centerlines)</h5>
        <label class='checkbox-container input'>Cutting aids
            <input id='cuttingAids' type='checkbox' onchange='drawSheet();'>
            <span class='checkmark'></span>
        </label>
		<h5 class='margin-bottom padding input-description'>Set the distance between cards (in pixels)</h5>
        <input type='number' id='cardMargin' class='input margin-bottom' value='60' min='0' max='100' onchange='setCardDistance(this.value);'>
        <h5 class='margin-bottom padding input-description'>Set PPI (pixels per inch; only relevant when exporting as a PNG)</h5>
        <input type='number' id='cardPPI' class='input margin-bottom' value='600' min='1' max='2400' onchange='setPPI(this.value);'>
	</div>
    <div class="layer">
        <div class='padding margin-bottom readable-background drop-area'>
            <h5 class='margin-bottom padding input-description'>Drag and drop the images that you'd like to print</h5>
            <input type='file' multiple accept='.png, .svg, .jpg, .jpeg, .bmp' placeholder='File Upload' class='input' oninput='uploadFiles(event.target.files, uploadCard, "filename");' data-dropFunction='uploadCard' data-otherParams='filename'>
        </div>
    </div>
    <div class="layer margin-bottom-large center">
        <canvas style='height: auto; max-width:850px; width: 100%; background: #fff;'></canvas>
    </div>
    <div class='readable-background padding layer margin-bottom-large'>
		<h3 class='download padding' onclick='downloadSheet();'>Download your Sheet (PNG)</h3>
		<h4 class='padding center'>(Can take a few seconds)</h4>
	</div>
	<div class='readable-background padding layer margin-bottom-large'>
		<h3 class='download padding' onclick='downloadPDF();'>Download your Sheet (PDF)</h3>
		<h4 class='padding center'>(WARNING: This can take around 15 seconds...)</h4>
	</div>
    <div class="readable-background layer margin-bottom-large">
        <h3 class='padding margin-bottom center'>
            Want to see your custom cards on the kitchen table?
        </h3>
        <h4 class='padding'>
        	Upload up to nine images, and they will automatically arrange themselves on an 8.5" by 11" sheet, so you can print them at home at up to 600PPI.
        </h4>
    </div>
	<script defer src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js'></script>
    <script defer src="/print/print.js"></script>
<?php include('../globalHTML/footer.php'); ?>