1. Propósito y coherencia con la Unidad 1
Este documento desarrolla los cinco criterios pendientes: flujo de trabajo de versiones, configuración del entorno, repositorio y evidencias, diagramas del sistema y diccionario de datos.
El sistema busca centralizar información escolar que actualmente puede depender de búsquedas manuales en Excel y comprobantes físicos. El alcance propuesto contempla alumnos, tutores, ciclos escolares, grupos, docentes, materias, calificaciones y pagos. El acceso de padres/tutores debe limitarse a los alumnos vinculados con su cuenta.
La propuesta técnica localizada para la Unidad 1 recomienda Laravel con MVC, PHP, Blade, HTML/CSS/JavaScript y MySQL: 
Decisión	Propuesta base	Qué confirmar
Arquitectura	Laravel MVC con Blade	Blade o API Laravel 
Base de datos	MySQL	Versión y entorno común del equipo.
Versionamiento	Git + GitHub	URL real del repositorio.
Metodología	Scrum para planificar; GitHub Flow para integrar código	Sprint y rama son conceptos distintos.
Roles	Administrador, Secretaría, Dirección, Docente, Tutor	Permisos reales por rol.
MVP	Alumnos, grupos, docentes, materias, pagos y seguimiento académico priorizado	Qué se entregará funcionando.

2. Definición del Workflow
2.1 Flujo elegido: GitHub Flow
GitHub Flow es apropiado para cuatro integrantes porque es sencillo: main contiene el código integrado y estable; cada tarea se desarrolla en una rama breve; los cambios se publican en GitHub y se integran mediante Pull Request (PR) después de revisión. Scrum organiza el trabajo por sprints; GitHub Flow organiza los cambios de código.
Elemento	Política del equipo
main	Rama estable. Evitar commits directos; integrar mediante PR revisado.
Ramas	Crear una rama por tarea a partir de main actualizado.
Nomenclatura	feature/SA-12-registro-alumnos; fix/SA-18-validar-pago; docs/SA-04-diagrama-der; test/SA-23-permisos.
Commits	Mensajes breves y descriptivos: feat(alumnos): agregar registro; fix(pagos): validar importe; docs(der): actualizar relaciones.
Pull Request	Debe explicar objetivo, cambios, pruebas, evidencia y tarea relacionada.
Revisión	Al menos un integrante distinto del autor revisa el cambio; el autor atiende observaciones.
Integración	Integrar solo si la aplicación funciona, los criterios se cumplen y no se exponen secretos.
Conflictos	Resolverlos coordinadamente; no sobrescribir cambios ajenos.
Cierre	Después de integrar, eliminar la rama y marcar la tarea como terminada si cumple sus criterios.

2.2 Pasos de trabajo
1.	Registrar la tarea en el backlog con prioridad, responsable y criterios de aceptación.
2.	Actualizar main local y crear una rama con nombre descriptivo.
3.	Desarrollar solo lo necesario para esa tarea; mantener commits pequeños.
4.	Probar el cambio y revisar el diff antes de publicarlo.
5.	Subir la rama al repositorio remoto y abrir un Pull Request hacia main.
6.	Solicitar revisión a otro integrante y atender los comentarios.
7.	Integrar el PR aprobado y comprobar que main sigue funcionando.
8.	Actualizar el tablero y documentar cualquier decisión importante.
2.3 Plantilla de Pull Request
## Objetivo
¿Qué necesidad resuelve?

## Cambios realizados
- ...

## Pruebas
- [ ] Flujo probado
- [ ] Validación backend revisada
- [ ] Permisos comprobados cuando aplica

## Evidencia
Captura o pasos de verificación.

## Tarea relacionada
SA-XX
2.4 Criterios de revisión
•	El cambio corresponde a una tarea identificada y no incluye modificaciones ajenas innecesarias.
•	La funcionalidad se puede ejecutar y probar.
•	Las validaciones importantes se hacen también en el servidor; no basta con validar en navegador.
•	No se suben contraseñas, archivos .env ni datos reales de menores.
•	Se revisan permisos, errores y efectos en otros módulos.
•	El autor no se autoaprueba: otra persona revisa el PR.
3. Configuración del entorno y repositorio
3.1 Preparación
•	Crear un repositorio GitHub llamado, por ejemplo, sistema-academico-v1; añadir a los cuatro integrantes con los permisos necesarios.
•	Crear README.md con objetivo, tecnologías, requisitos, instalación, configuración local y ejecución de pruebas.
•	Usar un .gitignore apropiado para Laravel/PHP, el sistema operativo y el IDE.
•	Agregar .env.example con nombres de variables y valores ficticios; no subir el .env real.
•	Documentar versiones de PHP, Composer, Laravel y MySQL; añadir Node/npm solo si la arquitectura elegida lo necesita.
•	Crear CONTRIBUTING.md o una sección en README con ramas, commits, PR y revisión.
•	Activar MFA en GitHub si está disponible; no compartir cuentas, contraseñas ni tokens.
Archivo	Finalidad	Regla
README.md	Instalación y presentación	Pasos probados y actualizados.
.gitignore	Excluir archivos locales, dependencias, cachés y secretos	Usar plantilla Laravel adecuada.
.env.example	Variables necesarias	Sin claves reales ni contraseñas válidas.
CONTRIBUTING.md	Política Git y PR	Debe coincidir con este documento.
docs/	Diagramas y documentación	No incluir datos personales reales.
composer.lock	Dependencias PHP fijadas	Versionarlo en una aplicación Laravel.
package-lock.json	Dependencias npm	Versionarlo si el proyecto usa npm.

3.2 Comandos orientativos
git clone <URL-REAL-DEL-REPOSITORIO>
cd sistema-academico-v1
git switch main
git pull origin main
git switch -c feature/SA-01-estructura-inicial
# editar y probar
git status
git add <archivos>
git commit -m "chore(proyecto): preparar estructura inicial"
git push -u origin feature/SA-01-estructura-inicial
Sustituir el marcador por la URL real. Estos comandos son una guía; no significan que el repositorio ya exista.
3.3 Credenciales y seguridad
•	No subir .env, llaves privadas, tokens, contraseñas ni respaldos con datos reales.
•	Si un secreto se publica, revocarlo o rotarlo inmediatamente; borrarlo del archivo no lo invalida.
•	Usar alumnos, pagos y calificaciones ficticios en desarrollo, capturas y demostraciones.
•	Dar permisos mínimos necesarios y revisar cuidadosamente cada PR.
•	Las contraseñas de usuarios deben almacenarse mediante hash seguro, nunca en texto plano.
4. Repositorio en funcionamiento y evidencias
La rúbrica pide evidencia real de actividad colaborativa. Una política escrita no sustituye la URL, ramas, commits y PR existentes. No se debe inventar un enlace ni fabricar capturas.
Evidencia	Debe demostrar	Qué adjuntar
E1 Repositorio	Repositorio remoto accesible para el docente	URL real y captura de portada.
E2 Configuración	README, .gitignore, .env.example	Capturas de los archivos en GitHub.
E3 Ramas	main y ramas con nomenclatura acordada	Captura del listado de ramas.
E4 Commits	Historial con mensajes claros	Captura del historial.
E5 Pull Request	Descripción, revisión y resultado	Captura de PR y comentarios reales.
E6 Colaboración	Participación de los cuatro integrantes	Commits/PR reales de cada integrante.
E7 Ejecución	La aplicación inicia y una función se prueba	Captura y pasos reproducibles.
E8 Documentación	Diagramas y diccionario guardados en repo	Captura de carpeta docs/.

Integrante	Responsabilidad sugerida	Evidencia práctica
Josué López Álvarez	Coordinar arquitectura, integración y revisión	Documentar arquitectura y revisar un PR ajeno.
Jorge Alejandro Montoya Salas	Facilitar flujo, seguimiento de tareas y revisión cruzada	Mantener tablero y revisar un PR.
Maximiliano Rodríguez Márquez	Implementar tareas asignadas de backend/modelos/datos	Rama, commits, PR y pruebas.
Ángel Roberto Ibáñez Chávez	Implementar tareas asignadas de interfaz/pruebas/documentación	Rama, commits, PR, capturas y pruebas.

La distribución puede ajustarse según habilidades. Lo importante es que cada integrante haga trabajo real y que las evidencias coincidan con el historial del repositorio.
5. Diagramas del sistema
5.1 Arquitectura lógica
En Laravel MVC, el navegador presenta las vistas Blade; las rutas reciben solicitudes; middleware aplica autenticación/autorización; los controladores validan y coordinan operaciones; los modelos Eloquent consultan MySQL. La autorización debe aplicarse en servidor.
Usuarios -> Navegador HTTPS -> Vistas Blade
         -> Rutas -> Middleware (sesión/autenticación/permisos)
         -> Controladores (reglas y validación)
         -> Modelos Eloquent / relaciones
         -> Base de datos MySQL
Servicios transversales: auditoría, errores seguros, respaldos y pruebas.
5.2 Casos de uso por actor
Actor	Casos de uso	Límite recomendado
Administrador	Gestionar usuarios/roles, ciclos y catálogos	Acceso administrativo según política.
Secretaría	Gestionar alumnos, grupos, registrar pagos, consultar comprobantes	Sin administrar roles si no corresponde.
Dirección	Consultar reportes, pagos y seguimiento autorizado	Cambios sensibles con trazabilidad.
Docente	Consultar grupos asignados y registrar/consultar calificaciones	Solo grupos y materias autorizados.
Tutor/Padre	Consultar calificaciones y pagos de sus hijos	Solo alumnos vinculados a su cuenta.

Código textual de apoyo para dibujar el diagrama UML en una herramienta compatible con PlantUML:
@startuml
left to right direction
actor Administrador
actor Secretaria
actor Direccion
actor Docente
actor "Tutor/Padre" as Tutor
rectangle "Sistema Académico V.1" {
 usecase "Gestionar usuarios y roles" as U1
 usecase "Gestionar alumnos y grupos" as U2
 usecase "Registrar/consultar pagos" as U3
 usecase "Consultar comprobantes" as U4
 usecase "Gestionar calificaciones" as U5
 usecase "Consultar seguimiento del hijo" as U6
 usecase "Consultar reportes autorizados" as U7
}
Administrador --> U1
Administrador --> U2
Secretaria --> U2
Secretaria --> U3
Secretaria --> U4
Direccion --> U7
Docente --> U5
Tutor --> U6
Tutor --> U4
@enduml
5.3 Diagrama entidad-relación (DER)
Diseño recomendado: separar alumno de inscripción para conservar el historial por ciclo. Un alumno puede tener varias inscripciones en distintos ciclos; los pagos se vinculan a la inscripción/ciclo correspondiente.
TUTORES N -- N ALUMNOS (tabla intermedia alumno_tutor)
ALUMNOS 1 -- N INSCRIPCIONES N -- 1 GRUPOS
CICLOS_ESCOLARES 1 -- N GRUPOS
GRUPOS N -- N DOCENTES (grupo_docente)
GRUPOS N -- N MATERIAS (grupo_materias; incluir docente si aplica)
INSCRIPCIONES 1 -- N PAGOS
INSCRIPCIONES 1 -- N CALIFICACIONES N -- 1 GRUPO_MATERIAS
USUARIOS vinculados a perfiles/roles según la autenticación elegida.
Entidad	Función
alumnos	Expediente base del alumno.
tutores	Personas responsables.
alumno_tutor	Relación N:M entre alumno y tutor.
ciclos_escolares	Catálogo de ciclos.
grupos	Grado y grupo dentro de un ciclo.
inscripciones	Relaciona alumno, grupo y ciclo; preserva historial.
docentes	Expedientes de docentes.
grupo_docente	Asignación de docentes a grupos.
materias	Catálogo de materias.
grupo_materias	Materia impartida a un grupo y docente asignado si aplica.
calificaciones	Nota por inscripción, materia y periodo.
pagos	Movimientos financieros por inscripción.
users	Cuentas de acceso; tabla estándar Laravel.

5.4 Reglas de integridad
•	Matrícula de alumno, número de empleado, folio de pago y correo de cuenta deben ser únicos en su ámbito.
•	Las claves foráneas deben impedir relaciones con alumnos, grupos o inscripciones inexistentes.
•	Un pago debe tener importe mayor que cero, fecha, concepto, inscripción y estado válidos.
•	La calificación debe respetar la escala institucional y periodo definido.
•	Evitar borrar físicamente pagos; preferir cancelación con motivo, usuario y fecha.
•	El historial escolar requiere Inscripcion; no guardar solo un grupo actual en la tabla alumnos.
•	Definir explícitamente si se permiten varios tutores, docentes por grupo y docentes por materia.
6. Diccionario de datos propuesto
Los tipos son propuestas para MySQL. La versión final debe coincidir con las migraciones Laravel y el DER. Para importes, usar DECIMAL y no FLOAT.
Convención	Uso
BIGINT UNSIGNED	Identificadores y claves foráneas habituales en Laravel.
VARCHAR(n)	Texto de longitud máxima definida.
DATE / DATETIME	Fecha o fecha/hora.
DECIMAL(10,2)	Importe monetario exacto.
BOOLEAN	Indicador verdadero/falso.
UNIQUE	Evita duplicados en el ámbito definido.
FK	Clave foránea que relaciona entidades.
created_at / updated_at	Timestamps estándar de Laravel.

Tabla: tutores
Campo	Tipo	Restricción / llave	Descripción
id	BIGINT UNSIGNED	PK	Identificador
nombres	VARCHAR(100)	NOT NULL	Nombre(s)
apellido_paterno	VARCHAR(60)	NOT NULL	Apellido paterno
apellido_materno	VARCHAR(60)	NULL	Apellido materno
telefono	VARCHAR(20)	NULL	Contacto
email	VARCHAR(150)	NULL	Correo de contacto

Tabla: alumnos
Campo	Tipo	Restricción / llave	Descripción
id	BIGINT UNSIGNED	PK	Identificador
matricula	VARCHAR(20)	UNIQUE, NOT NULL	Matrícula única
nombres	VARCHAR(100)	NOT NULL	Nombre(s)
apellido_paterno	VARCHAR(60)	NOT NULL	Apellido paterno
apellido_materno	VARCHAR(60)	NULL	Apellido materno
fecha_nacimiento	DATE	NULL	Fecha de nacimiento
estatus	VARCHAR(20)	NOT NULL	Activo/baja/egresado

Tabla: alumno_tutor
Campo	Tipo	Restricción / llave	Descripción
id	BIGINT UNSIGNED	PK	Identificador
alumno_id	BIGINT UNSIGNED	FK alumnos.id	Alumno asociado
tutor_id	BIGINT UNSIGNED	FK tutores.id	Tutor asociado
parentesco	VARCHAR(30)	NULL	Relación familiar/legal
es_principal	BOOLEAN	DEFAULT FALSE	Contacto principal
alumno_id+tutor_id	—	UNIQUE	No repetir relación

Tabla: ciclos_escolares
Campo	Tipo	Restricción / llave	Descripción
id	BIGINT UNSIGNED	PK	Identificador
nombre	VARCHAR(20)	UNIQUE	Ej. 2026-2027
fecha_inicio	DATE	NOT NULL	Inicio
fecha_fin	DATE	NOT NULL	Fin
activo	BOOLEAN	DEFAULT FALSE	Ciclo activo

Tabla: grupos
Campo	Tipo	Restricción / llave	Descripción
id	BIGINT UNSIGNED	PK	Identificador
ciclo_escolar_id	BIGINT UNSIGNED	FK ciclos_escolares.id	Ciclo del grupo
grado	TINYINT UNSIGNED	NOT NULL	Grado; validar rango
nombre_grupo	VARCHAR(10)	NOT NULL	Ej. A/B
capacidad	SMALLINT UNSIGNED	NULL	Capacidad
ciclo+grado+nombre_grupo	—	UNIQUE	Grupo único dentro del ciclo

Tabla: inscripciones
Campo	Tipo	Restricción / llave	Descripción
id	BIGINT UNSIGNED	PK	Identificador
alumno_id	BIGINT UNSIGNED	FK alumnos.id	Alumno
grupo_id	BIGINT UNSIGNED	FK grupos.id	Grupo del ciclo
fecha_inscripcion	DATE	NOT NULL	Fecha
estatus	VARCHAR(20)	NOT NULL	Activa/baja/finalizada
alumno+grupo	—	REVISAR UNIQUE	Ajustar para permitir reinscripción conforme a reglas reales

Tabla: docentes
Campo	Tipo	Restricción / llave	Descripción
id	BIGINT UNSIGNED	PK	Identificador
numero_empleado	VARCHAR(20)	UNIQUE	Clave de empleado
nombres	VARCHAR(100)	NOT NULL	Nombre(s)
apellidos	VARCHAR(120)	NOT NULL	Apellidos
email	VARCHAR(150)	NULL	Correo institucional
estatus	VARCHAR(20)	NOT NULL	Activo/inactivo

Tabla: grupo_docente
Campo	Tipo	Restricción / llave	Descripción
id	BIGINT UNSIGNED	PK	Identificador
grupo_id	BIGINT UNSIGNED	FK grupos.id	Grupo
docente_id	BIGINT UNSIGNED	FK docentes.id	Docente
tipo_asignacion	VARCHAR(30)	NULL	Titular/auxiliar/otra
grupo+docente	—	UNIQUE	Evitar asignación duplicada

Tabla: materias
Campo	Tipo	Restricción / llave	Descripción
id	BIGINT UNSIGNED	PK	Identificador
clave	VARCHAR(20)	UNIQUE	Clave de catálogo
nombre	VARCHAR(100)	UNIQUE	Nombre
descripcion	VARCHAR(255)	NULL	Descripción
activa	BOOLEAN	DEFAULT TRUE	Disponible para asignar

Tabla: grupo_materias
Campo	Tipo	Restricción / llave	Descripción
id	BIGINT UNSIGNED	PK	Identificador
grupo_id	BIGINT UNSIGNED	FK grupos.id	Grupo
materia_id	BIGINT UNSIGNED	FK materias.id	Materia
docente_id	BIGINT UNSIGNED	FK docentes.id / NULL	Docente asignado si aplica
grupo+materia	—	UNIQUE provisional	Revisar si varios docentes comparten materia

Tabla: calificaciones
Campo	Tipo	Restricción / llave	Descripción
id	BIGINT UNSIGNED	PK	Identificador
inscripcion_id	BIGINT UNSIGNED	FK inscripciones.id	Inscripción del alumno
grupo_materia_id	BIGINT UNSIGNED	FK grupo_materias.id	Materia del grupo
periodo	VARCHAR(30)	NOT NULL	Bimestre/trimestre/periodo
calificacion	DECIMAL(4,2)	NOT NULL	Escala definida por la escuela
observaciones	VARCHAR(500)	NULL	Observación autorizada
inscripcion+grupo_materia+periodo	—	UNIQUE	Evitar calificación duplicada

Tabla: pagos
Campo	Tipo	Restricción / llave	Descripción
id	BIGINT UNSIGNED	PK	Identificador
inscripcion_id	BIGINT UNSIGNED	FK inscripciones.id	Ciclo al que corresponde
folio	VARCHAR(30)	UNIQUE	Folio de recibo
concepto	VARCHAR(50)	NOT NULL	Colegiatura/inscripción/etc.
periodo	VARCHAR(20)	NULL	Mes o periodo cubierto
importe	DECIMAL(10,2)	NOT NULL	Mayor que cero
fecha_pago	DATETIME	NOT NULL	Fecha y hora
metodo_pago	VARCHAR(30)	NOT NULL	Método permitido
estatus	VARCHAR(20)	NOT NULL	Pagado/cancelado/etc.
registrado_por	BIGINT UNSIGNED	FK users.id	Usuario que registró
motivo_cancelacion	VARCHAR(255)	NULL	Motivo si se anula

Tabla: users
Campo	Tipo	Restricción / llave	Descripción
id	BIGINT UNSIGNED	PK	Identificador Laravel
name	VARCHAR(255)	NOT NULL	Nombre visible
email	VARCHAR(255)	UNIQUE	Cuenta de acceso
password	VARCHAR(255)	NOT NULL	Hash de contraseña
rol	VARCHAR(30)	NOT NULL provisional	Rol inicial; valorar roles/permisos normalizados
activo	BOOLEAN	DEFAULT TRUE	Desactivar sin borrar historial

6.1 Tablas opcionales
Tabla	Cuándo usarla	Objetivo
roles / permissions	Si se requieren permisos granulares	Evitar un rol rígido en texto.
conceptos_pago	Si los conceptos son administrables	Mantener catálogo consistente.
auditoria	Para cambios sensibles	Registrar usuario, acción, entidad, fecha y motivo.
periodos_academicos	Si los periodos cambian por ciclo	Normalizar periodos de calificación.
sessions / password_reset_tokens	Según autenticación Laravel	Soporte de sesiones y recuperación.

7. Checklist de entrega contra la rúbrica
Criterio	Contenido preparado	Falta evidencia real
Workflow	GitHub Flow, ramas, commits, PR y revisión	Política publicada y PR real.
Configuración	README, .gitignore, .env.example, accesos y secretos	Capturas de archivos reales.
Repositorio	Plan de evidencias y roles de colaboración	URL, ramas, commits, PR y ejecución.
Diagramas	Arquitectura, casos de uso y DER lógico	Exportar diagramas gráficos legibles.
Diccionario	Campos, tipos, llaves, restricciones y descripciones	Ajustar a migraciones y DER finales.

8. Conclusión
Para alcanzar el nivel más alto de la rúbrica, el equipo debe combinar este diseño con evidencia de implementación: repositorio real, actividad de los cuatro integrantes, PR revisados, diagramas exportados y diccionario sincronizado con la base de datos. Los nombres y campos aquí propuestos son una base de diseño; no deben presentarse como tablas ya implementadas si todavía no existen.
