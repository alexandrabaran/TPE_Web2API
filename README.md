# TPE_Web2API
Grupo 50 - Baran Valeska Alexandra, Sironi Camila

# ENDPOINTS:

### - GET /categories
Accede al listado de categorias

### - GET /categories/:id (ej /categories/1)
Accede al detalle de la categoria con el id especificado

### - POST /categories
Crea una categoria nueva

### - PUT /categories/:id (ej /categories/1)
Edita la categoria con el id especificado, sustituyendo la información enviada

### - DELETE /categories/:id (ej /categories/1)
Elimina la categoria con el id especificado

### - GET /products
Accede al listado de productos

### - GET /products/:id (ej /products/1)
Accede al detalle de el producto con el id especificado

### - GET /products?category_id=id (ej /products?category_id=1)
Accede al listado de los productos filtrando por categoria con el id especificado

### - GET /products?product_price=(num≠0) (ej /products?product_price=1)
Accede al listado de los productos mostrando en orden ascendente segun el precio 

### - GET /products?page=(registro) (ej /products?page=1)
Accede al listado de los productos mostrando a partir del registro siguiente al especificado

### - POST /products
Crea un producto nuevo

### - PUT /products/:id (ej /products/1)
Edita el producto con el id especificado, sustituyendo la información enviada

### - DELETE /products/:id (ej /products/1)
Elimina el producto con el id especificado
