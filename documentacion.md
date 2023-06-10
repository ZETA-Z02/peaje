# PEAJE PROYECT

# LISTA DE ENTIDADES

### E. PERSONAL
- id_personal    *(PK)* ---INT AUTO INCREMENT UNIQUE
- nombre                ---VARCHAR(50)
- apellido              ---VARCHAR(50)
- dni                   ---INT UNIQUE
- telefono              ---INT UNIQUE
- correo                ---VARCHAR(50)
- direccion             ---VARCHAR(60)
- genero                ---VARCHAR(10)

### E. LOGINS
- id_login       *(PK)* ---INT AUTO INCREMENT UNIQUE
- id_personal    *(FK)* ---INT 
- usuario               ---INT UNIQUE
- contrasena            ---VARCHAR(250)
- nivel_usuario         ---TINYINT        ->nivel de usuario dependiendo de su cargo (1-2-3) 1= administrador, 2=supervisor, 3=personal

### E. TARIFAS (CATEGORIA)
- id_cat         *(PK)* ---INT AUTO INCREMENT UNIQUE
- descripcion           ---TEXT            ->descripcion del tipo de vehiculo su NUM. ejes y peso
- tarifa                ---FLOAT(2)        -> Tarifa Máxima a cobrar en doble sentido (Incluido IGV) FLOAT(2)


### E. REGISTRO DE VEHICULOS

- id_registro    *(PK)* ---INT AUTO INCREMENT UNIQUE 
- placa                 ---VARCHAR(8)      
- id_categoria   *(FK)* ---INT             ->id de la tarifa(categoria) que es el vehiculo
- fecha                 ---DATE Y-m-d    
- hora                  ---DATE H-i-s      
- opcion_pago           ---VARCHAR(20)     ->Efectivo o RUC
- monto                 ---FLOAT           ->NUM RUC o soles
- cobrador       *(FK)* ---INT             ->id del personal que hizo el registro

## RELACIONES

- La tabla "personal" tiene una relacion de 1:M con la tabla "REGISTRO DE VEHICULOS"

- La tabla "personal" tiene una relacion de 1:1 con la tabla "LOGIN"

- La tabla "tarifa" tiene una relacion de 1:M con la tabla "REGISTRO DE VEHICULOS"

1. la tabla *personal* tiene una relacion de 1:M con la tabla *registro del vehiculos* porque un solo personal puede hacer muchos registros.
2. La tabla *personal* tiene una relacion de 1:1 con la tabla *LOGIN* porque una sola persona solo puede tener un solo login a la vez.
3. La tabla *tarifa* tiene una relacion de 1:M con la tabla *REGISTRO DE VEHICULOS* porque una tarifa es para muchos registros de vehiculos. 

## REGLAS DE NEGOCIO

### PERSONAL
1. Crear personal
2. Leer todo el personal 
3. Leer a un personal en particular
4. Actualizar un personal
5. Eliminar un personal

### LOGINS

1. crear login 
2. leer a todo el login
3. leer un login en particular
4. actualizar a un login 
5. eliminar a un login  

### TARIFA 

1. Actualizar una tarifa
2. Leer una tarifa
3. Leer una tarifa en particular

### REGISTRO DE VEHICULOS

1. Crear un nuevo registro
2. Actualizar un registro en particular
3. Leer todo el registro
4. Leer un registro en particular
5. Eliminar un registro en particular