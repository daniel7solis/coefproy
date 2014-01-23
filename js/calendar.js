var $aux, $aux2, $aux3,
	ene = [31,3,"ENERO"],
	feb = [28,6,"FEBRERO"],
	mar = [31,6,"MARZO"],
	abr = [30,2,"ABRIL"],
	may = [31,4,"MAY"],
	jun = [30,0,"JUNIO"],
	jul = [31,2,"JULIO"],
	ago = [31,5,"AGOSTO"],
	sep = [30,1,"SEPTIEMBRE"],
	oct = [31,2,"OCTUBRE"],
	nov = [30,6,"NOVIEMBRE"],
	dic = [31,1,"DICIEMBRE"],
	meses = [ene,feb,mar,abr,may,jun,jul,ago,sep,oct,nov,dic],
	mes = [],
	cont = 1,
	col = 0,
	now = new Date(),
	ref = now.getMonth(),
	$prev = $('.prev_month'),
	$next = $('.next_month');

	function actual()
	{
		var num = now.getMonth()
		asignar(num)
	}

	function asignar(num)
	{
		limpiar()
		mes = meses[num]
		generar(num)
	}

	function limpiar()
	{
		var temp=0;
		while(temp<=34)
		{
			$aux3 = $('#esp'+temp)
			$aux3.html('')
			temp++
		}
		temp=0
	}

	function generar(num)
	{
		col = mes[1]
		$aux2 = $('.month_title')
		$aux2.html(mes[2])
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
					$aux.css({'color':'gray','text-decoration':'line-through'})
				}
				if(cont-1==now.getDate())
				{
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
				$aux.css({'background':'transparent','border-radius':'none','color':'black','padding':'0','text-decoration':'none'})
			}
			cont=1
			col=0
		}
	}

	function anterior()
	{
		if(ref>now.getMonth())
		{
			ref--
			asignar(ref)
		}
	}

	function siguiente()
	{
		if(ref<11)
		{
			ref++
			asignar(ref)
		}
	}