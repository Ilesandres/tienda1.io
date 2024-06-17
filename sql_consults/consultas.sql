
##para traer los productos con sus datos generales para mostrar

select producto.id, producto.img ,producto.descripcion, producto.unidadMedida, producto.stock,
producto.saldo ,producto.precioBase, estadoproducto.estado,producto.fechaRegistro,
producto.fechaActualizacion,producto.idUsuario
from producto
inner join estadoproducto on producto.estado=estadoproducto.idestadoProducto order by 1;