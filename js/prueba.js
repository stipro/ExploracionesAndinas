const kitchen = async = (stocks) =>{
    console.log('wwww');
    try{
      await time(2000)
      console.log(`${stocks.Fruits[0]} fue seleccionado`)

      await time(0000)
      console.log("la producción ha comenzado")

      await time(2000)
      console.log("la fruta ha sido picada")

      await time(1000)
      console.log(`${stocks.liquid[0]} y ${stocks.liquid[1]} agregado`)

      await time(1000)
      console.log("poner en marcha la máquina")

      await time(2000)
      console.log(`helado colocado en ${stocks.holder[1]}`)

      await time(3000)
      console.log(`${stocks.toppings[0]} como cobertura`)

      await time(2000)
      console.log("servir helado")
    }

    catch(error){
	 console.log("el cliente se fue")
    }
}
kitchen();