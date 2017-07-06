<?php
	$msg = $sp = $retorno = null;
	include 'controllerIndex.php';
?>
<html lang='pt-br'>
	<head>
		<title>Caesar Cipher</title>
		<link rel='stylesheet' type='text/css' href='css/css.css'>
	</head>
	<body>
		<header>
			<span class="indent">Caesar Cipher</span>
		</header>
		<div id="container">
	
			<div class="inner-center">
			
				<div class="julius"></div>
				
				<p>
					<span class="bold">Codificar ou decodificar usando <a href="http://en.wikipedia.org/wiki/Caesar_cipher" target="_blank">Cifra de cesar</a>.</span>
				</p>
				<form method='POST' action='' >
					<table>
						<tr>
							<td colspan='2'>
								<label>Mensagem</label>
								<textarea class="t" onfocus='this.select()' name='msg' placeholder='texto, mensagem ...' ><?=$msg?></textarea>
							</td>
						</tr>
						<tr>
							<th>Parametro:</th>
							<td>
								<input type='text' name='sp' maxlength='10' value='<?=$sp?>' placeholder='numero maior que zero' >
							</td>
						</tr>
						<tr>
							<td colspan='2'>
								<input type='button' value='Codificar'>
								<input type='button' value='Decodificar'>
								<input type='button' value='Auto'> 
								<input type='button' value='Limpar'> 
							</td>
						</tr>
					</table>
				</form>
				<?php if(isset($retorno)){ 
						if($retorno){
				?>
				<p> retorno  
						<?php
						if($function == 'codificar')
							echo 'da codificação';
						else if($function == 'decodificar')
							echo 'da decodificação';
						else if($function == 'auto')
							echo 'auto decodificação';
						?>
					<div id='retorno'>
						<?=$retorno?>
					</div>
				</p>
				<?php 
					}else{
						echo "<h3>não foi possivel efetuar a ação</h3>";
					}
				}
				?>
			</div>
		</div>

		<footer class="footer"><span>Caesar cipher</span></footer>
	</body>
	<script type="text/javascript" src="js/jquery_code.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
</html>
