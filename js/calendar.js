/* -------------------- calendar.js by Daniel Vega -------------------------
   Plugin que contiene las funcionalidades de calendario.php. Genera los días
   de cada mes y los meses del 2014. Una vez que pase el año, sólo se actua-
   lizará ÉSTE archivo js.
*/

// Definición de las variables necesarias.
 var $aux, $aux2, $aux3,
	ene = [31,3,"ENERO"],
	feb = [28,6,"FEBRERO"],
	mar = [31,6,"MARZO"],
	abr = [30,2,"ABRIL"],
	may = [31,4,"MAYO"],
	jun = [30,0,"JUNIO"],
	jul = [31,2,"JULIO"],
	ago = [31,5,"AGOSTO"],
	sep = [30,1,"SEPTIEMBRE"],
	oct = [31,2,"OCTUBRE"],
	nov = [30,6,"NOVIEMBRE"],
	dic = [31,1,"DICIEMBRE"],
	meses = [ene,feb,mar,abr,may,jun,jul,ago,sep,oct,nov,dic],
	mesesagenda = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
	diasagenda = ["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"],
	mes = [],
	cont = 1,
	col = 0,
	now = new Date(),
	ref = now.getMonth(),
	$prev = $('.prev_month'),
	$next = $('.next_month');

// Cuando la página haya cargado...
$( document ).ready(function()
{
	// Se agrega la funcionalidad a cada día para que envíe sus datos a
	// agenda.php 
	$('td.calendar_row').on('click', function()
	{
		document.location.href = "agenda.php?ndia="+$(this).attr('value')+"&dia="+$(this).text()+"&mes=" + mesesagenda[ref]+"&ano=2014";
	});
});

// Obtiene el mes actual.
function actual()
{
	var num = now.getMonth()
	asignar(num)
}

// Asigna el mes deseado.
function asignar(num)
{
	limpiar()
	ref=num
	mes = meses[num]
	generar(num)
}

// Limpia los días antes de generar un nuevo mes.
function limpiar()
{
	var temp=0;
	while(temp<=36)
	{
		$aux3 = $('#esp'+temp)
		$aux3.html('')
		temp++
	}
	temp=0
}

// Genera los días en base al mes.
function generar(num)
{
	col = mes[1];
	$aux2 = $('.month_title');
	$aux2.html(mes[2]);
	if(num==now.getMonth())
	{
		while(cont<=mes[0])
		{
			$aux = $('#esp'+col)
			$aux.html(cont)
			col++
			cont++
			if(cont-1<now.getDate())
			{
				// Días pasados.
				$aux.css({'color':'gray','text-decoration':'line-through'})
			}
			if(cont-1==now.getDate())
			{
				// Día actual.
				$aux.css({'background':'#DD4F24','border-radius':'50%','color':'white','padding':'0.2em'})
			}
		}
		cont=1
		col=0
	}
	else
	{
		while(cont<=mes[0])
		{
			$aux = $('#esp'+col)
			$aux.html(cont)
			col++
			cont++
			// Días disponibles.
			$aux.css({'background':'transparent','border-radius':'none','color':'black','padding':'0','text-decoration':'none'})
		}
		cont=1
		col=0
	}
}

// Disparador para generar un mes antes. Límite el mes actual.
function anterior()
{
	if(ref>now.getMonth())
	{
		ref--
		asignar(ref)
	}
}

// Disparador para generar un mes después. Límite Diciembre dle año en curso.
function siguiente()
{
	if(ref<11)
	{
		ref++
		asignar(ref)
	}
}