var a = [1,2,3,4],
	sum = 0,
	mult = 1

for (var i = 0; i < a.length; i++) {
	sum += a[i]
	mult *= a[i]
	console.log('Posición del arreglo: '+i, 'Suma: '+sum, 'Multiplicación: '+mult)
}