UNIVERSIDAD TECNOLÓGICA DE TORREÓN
INGENIERÍA EN DESARROLLO Y GESTIÓN DE SOFTWARE


ENTREGABLES DE LA RÚBRICA — UNIDAD 2
Sistema Académico de Seguimiento a Finanzas y Alumnos V.1
Integrantes:
Josué López Álvarez — Líder de equipo / Product Owner
Jorge Alejandro Montoya Salas — Scrum Master
Maximiliano Rodríguez Márquez — Equipo de desarrollo
Ángel Roberto Ibáñez Chávez — Equipo de desarrollo
Docente: Jesús Robledo del Toro
Grupo: 8.º “A”
Documento de trabajo técnico. Los enlaces, capturas y evidencias del repositorio deben completarse con información real del equipo.
 
 

MAQUETADO Y PROTOTIPADO
SECCIÓN 1: MAQUETADO (FRONT-END Y DISEÑO DE INTERFACES)
El maquetado del sistema se estructuró e implementó garantizando una interfaz de usuario limpia, semántica y modular. Se utilizaron estándares web modernos mediante HTML5, CSS3, JavaScript y el motor de plantillas Blade de Laravel.
Para mitigar el riesgo identificado de saturación visual (R4), se aplicó un patrón visual responsivo con una Barra Lateral Fija (Sidebar) y un Área de Trabajo Central Limpia.
1.1 Estructura Base y Layout Principal (layouts/app.blade.php)
•	Sidebar (Navegación Lateral): Muestra dinámicamente las opciones del menú según el rol autenticado (Inicio, Alumnos, Grupos, Docentes, Materias, Pagos).
•	Navbar (Barra Superior): Muestra de forma fija el logotipo institucional de la escuela, el nombre del usuario conectado, el rol activo (Administrador, Cajero Escolar o Padre de Familia) y el botón de cierre de sesión seguro.
1.2 Maquetado por Módulos y Vistas Clave
• Módulo de Autenticación (/login): Diseñado con un contenedor central minimalista que incluye el logotipo escolar. Campos de entrada estilizados para Usuario o correo y Contraseña, acompañados de un enlace de recuperación ("¿Olvidaste tu contraseña?") y un botón principal de acceso (Iniciar sesión).
• Módulo de Alumnos y Búsqueda Avanzada: Estructurado con un panel superior de filtros avanzados (selectores y cajas de texto para Matrícula, Nombre, Grado, Grupo, Ciclo escolar, Estatus y Filtro financiero OK/Pendiente). Tabla de resultados con filas alternadas y limpias que muestran de inmediato el estado del alumno.
• Módulo de Grupos y Tutor Escolar: Diseñado con una cabecera que incluye el botón de acción rápida + Grupo. Contiene una sección interactiva para la asignación rápida de tutores mediante la secuencia: seleccionar grupo -> elegir maestro -> Confirmar.
• Módulo de Docentes y Horarios: Vista dividida en dos secciones: a la izquierda, la lista de docentes y su barra de búsqueda; a la derecha, una ficha detallada con la información de contacto, grupo que tutorea y una tabla matricial de horarios semanales estructurada por hora (Lunes a Viernes).
• Módulo de Control de Pagos y Finanzas (Cajero Escolar): Incluye controles para buscar alumnos, visualizar el contador de total de pendientes (Total pendiente: [$]) y botones de acción para Exportar, Generar ficha de pago y Registrar pago.
• Vista de Ficha de Pago: Maquetada como un recibo formal listo para impresión o descarga, que incluye el folio dinámico [#], datos del alumno, concepto, monto, fecha límite, referencia y simulación de código de barras.
• Vista Exclusiva para Padres de Familia: Una interfaz simplificada de solo lectura que restringe elementos administrativos y muestra únicamente: datos generales del hijo/a, grupo y maestro tutor asignado, materias/horario y el estatus de sus pagos con acceso directo a la descarga de sus fichas.
SECCIÓN 2: PROTOTIPADO Y FLUJOS DE NAVEGACIÓN
Se ha diseñado la distribución espacial de las pantallas y los flujos de interacción del usuario (User Flow) para garantizar una experiencia ágil (UX), reduciendo los tiempos de atención en ventanilla de 2 horas a un máximo de 30 minutos, tal como marcan nuestros objetivos.
2.1 Arquitectura de Navegación por Roles
El prototipo establece una separación estricta de pantallas y permisos controlados desde el inicio de sesión:
•	Rol Administrador: Tiene acceso completo al árbol de navegación general (Dashboard, Alumnos, Grupos, Docentes, Materias, Pagos y configuraciones del sistema).
•	Rol Cajero Escolar: Su flujo está optimizado exclusivamente para el núcleo financiero, operando directamente sobre el módulo de Control de Pagos, generación de folios y emisión de fichas.
•	Rol Padre de Familia: Presenta un flujo cerrado y de estricta protección de datos; al autenticarse, el sistema lo redirige a una interfaz focalizada únicamente en el expediente de su hijo, bloqueando la navegación hacia otros alumnos o módulos generales.
2.2 Flujo del Motor de Búsqueda Avanzada
El prototipo resuelve la problemática de encontrar registros entre miles de datos mediante un flujo de filtrado en cascada:
•	Entrada: El usuario accede al módulo (ej. Alumnos o Pagos).
•	Filtros combinados: El prototipo permite aplicar simultáneamente varios criterios (Grado 3° + Grupo A + Estatus Activo + Finanzas Pendiente).
•	Salida inmediata: La interfaz actualiza la tabla de resultados en tiempo real, permitiendo identificar de un vistazo quiénes tienen adeudos (marcado visualmente en color o estatus) para proceder a la acción requerida sin saturar al operador.
2.3 Flujo Transaccional del Módulo de Pagos
El flujo interactivo para el registro y cobro se estructuró de la siguiente manera:
1. Localización: El cajero busca al alumno mediante su matrícula o nombre.
2. Selección: El sistema despliega el estado de cuenta actual y los conceptos pendientes.
3. Ejecución: Se selecciona el concepto a liquidar y se presiona Registrar pago.
4. Generación de Evidencia: Automáticamente el sistema transiciona a la vista de Ficha de Pago, habilitando de forma inmediata los botones de acción física Imprimir o digital Descargar PDF con su respectivo folio único y código de referencia.
JUSTIFICACIÓN TÉCNICA DE GITHUB Y FLUJO DE TRABAJO (GITFLOW)
1. JUSTIFICACIÓN TÉCNICA DEL USO DE GITHUB Y GIT
Para el desarrollo del Sistema Académico de Seguimiento a Finanzas y Alumnos V.1, la selección de Git como sistema de control de versiones distribuido y GitHub como plataforma de alojamiento colaborativo responde a la necesidad de garantizar la integridad del código fuente, coordinar el trabajo del equipo de desarrollo y dar soporte formal a la metodología ágil (Scrum) implementada.
• Garantía de Trazabilidad e Histórico de Cambios: Permite registrar minuciosamente cada modificación realizada en el repositorio, asociando autor, fecha, hora y descripción detallada (commit message). Esto mitiga directamente los riesgos R10 (Ausencia de integrante del equipo) y R12 (Retrasos del equipo), permitiendo auditar el código o reasignar tareas sin depender de archivos locales ni perder avances previas.
• Colaboración Segura y Desarrollo Paralelo: El equipo de desarrollo (Maximiliano Rodríguez y Angel Ibañez) requiere trabajar de manera simultánea en el diseño del frontend (vistas Blade, CSS, JS) y la lógica del backend (Controladores, Modelos). El uso de Git y GitHub evita la sobreescritura accidental de archivos mediante la creación de ramas independientes (branches) y la integración controlada a través de Pull Requests (PR).
• Sincronización de Base de Datos y Estructura Laravel: Al utilizar Laravel Migrations para el modelado relacional en MySQL, GitHub actúa como el canal centralizado para sincronizar cambios en el esquema de la base de datos entre todos los entornos de trabajo, eliminando la práctica insegura de compartir scripts .sql manuales.
• Seguridad y Control de Secretos (Mitigación R11): Alineado con los requerimientos de la Matriz de Validación y Seguridad de la Información, GitHub permite gestionar de forma estricta los archivos sensibles mediante el uso del archivo .gitignore. De esta forma se previene la exposición accidental de claves de entorno (.env), contraseñas de base de datos o tokens de acceso en el repositorio.
• Sincronización con la Metodología Scrum y Sprints: Permite vincular cada commit, rama o Pull Request directamente con las tareas y módulos definidos en el Backlog por el Product Owner (Josue López) y supervisados por el Scrum Master (Jorge Montoya), asegurando entregables alineados a los plazos establecidos en el cronograma de los Sprints 1 a 5.
2. ESTRATEGIA Y FLUJO DE TRABAJO (GITFLOW SIMPLIFICADO)
Con el objetivo de mantener la estabilidad de la aplicación en producción y permitir la adición continua de características, se ha adoptado una versión adaptada del modelo Gitflow. Esta estructura delimita la responsabilidad de cada rama dentro del ciclo de vida del software:
┌────────────────────────────────────────────────────────────────────────┐
│  [ feature/login ]  ───┐                                              │
│                        ├───> [ develop ] ───(Sprint Done)───> [ main ] │
│  [ feature/pagos ]  ───┘                                (Producción)  │
└────────────────────────────────────────────────────────────────────────┘
2.1 Arquitectura de Ramas
•	main (Rama de Producción): Contiene el código estable, verificado y listo para su despliegue operativo. Queda estrictamente prohibido realizar commits directos sobre esta rama.
•	develop (Rama de Integración): Rama principal de desarrollo. Agrupa todas las características completadas y probadas durante el Sprint. Es el punto de partida para la creación de nuevas funcionalidades.
•	feature/<módulo-tarea> (Ramas de Funcionalidad): Ramas temporales donde los desarrolladores construyen tareas específicas sin afectar el código base. Ejemplos: feature/alumnos-modulo, feature/login-auth, feature/control-pagos.
•	hotfix/<incidencia> (Correcciones Urgentes): Ramas de emergencia creadas para solucionar errores críticos detectados durante la fase de QA/Pruebas de Seguridad (Sprint 5) o en producción.



-----------------------------------------------------------------------------------------------------------------------------
2.2 Protocolo de Trabajo Paso a Paso para Desarrolladores
2.2.1 Objetivo del protocolo
Establecer un procedimiento estandarizado para que los integrantes del equipo de desarrollo colaboren de manera organizada mediante Git y GitHub, manteniendo un historial de cambios trazable, reduciendo conflictos de integración y asegurando que el código incorporado al proyecto cumpla con los requerimientos funcionales, la arquitectura MVC de Laravel y los criterios de calidad y seguridad definidos para el Sistema Académico de Seguimiento a Finanzas y Alumnos V.1.
El protocolo será aplicado por los cuatro integrantes del equipo durante el desarrollo de cada funcionalidad, corrección o actividad de documentación.
2.2.2 Protocolo de trabajo
1. Actualización del repositorio local
Antes de iniciar una nueva tarea, el desarrollador deberá verificar que su repositorio local se encuentre sincronizado con la rama de integración develop. Esto permitirá trabajar sobre la versión más reciente del proyecto y disminuir posibles conflictos.
Comandos:
git switch develop
git pull origin develop
git status
Criterios de cumplimiento:
•	La rama local deberá encontrarse actualizada con respecto al repositorio remoto.
•	No deberán existir cambios locales sin guardar que puedan perderse durante la actualización.
•	Si existen conflictos o errores de sincronización, deberán resolverse antes de comenzar la tarea.
•	El desarrollador deberá confirmar que el proyecto continúa funcionando después de actualizarlo.
2. Creación de la rama de trabajo
Cada funcionalidad, corrección o actividad relevante deberá desarrollarse en una rama independiente, creada a partir de develop. No se realizarán modificaciones directas sobre las ramas principales de integración y entrega.
Ejemplo:
git switch -c feature/modulo-pagos
Nomenclatura de ramas:
Prefijo	Propósito	Ejemplo
feature/	Nueva funcionalidad	feature/registro-alumnos
fix/	Corrección de errores	fix/validacion-pagos
test/	Pruebas del sistema	test/login-usuarios
docs/	Documentación técnica	docs/diagrama-der
refactor/	Mejora interna del código sin cambiar su comportamiento esperado	refactor/controlador-alumnos
Cuando exista una tarea identificada en el tablero de seguimiento, se recomienda incluir su identificador en el nombre de la rama. Por ejemplo: feature/SA-12-registro-alumnos.
Criterios de cumplimiento:
•	Cada rama deberá corresponder a una tarea identificable.
•	Los nombres deberán ser descriptivos, breves y utilizar minúsculas con guiones.
•	Las ramas deberán crearse desde develop actualizado.
•	Una vez integrada y verificada la tarea, la rama podrá eliminarse para mantener ordenado el repositorio.
3. Desarrollo, validación y registro de cambios
El desarrollador implementará únicamente los cambios necesarios para cumplir con los criterios de aceptación de su tarea. Antes de registrar los cambios, deberá revisar los archivos modificados y ejecutar las pruebas pertinentes.
Comandos de referencia:
git status
git diff
git add <archivos>
git commit -m "feat: agregar registro de pagos"
Los commits deberán ser pequeños, comprensibles y relacionados con una modificación lógica concreta. Se recomienda utilizar mensajes consistentes que indiquen el tipo de cambio.
Prefijo	Uso	Ejemplo
feat:	Nueva funcionalidad	feat: agregar consulta de pagos pendientes
fix:	Corrección de errores	fix: validar importe del pago
docs:	Documentación	docs: actualizar diccionario de datos
test:	Pruebas	test: agregar pruebas de validacion de alumnos
refactor:	Reestructuración interna	refactor: simplificar controlador de grupos
chore:	Mantenimiento o configuración	chore: actualizar configuracion del proyecto
Criterios de cumplimiento:
•	Los commits no deberán mezclar cambios independientes sin justificación.
•	No se incorporarán archivos temporales, contraseñas, tokens ni archivos .env con credenciales reales.
•	Las validaciones críticas deberán implementarse en el servidor, no solamente en la interfaz.
•	Los cambios deberán respetar la separación de responsabilidades de Laravel MVC.
•	Cuando corresponda, se probarán las reglas de negocio, los permisos y los casos de error.
4. Publicación de la rama y creación del Pull Request
Una vez terminada la tarea y realizadas las pruebas locales, el desarrollador publicará su rama en GitHub y abrirá un Pull Request (PR) dirigido a develop.
Comandos:
git push -u origin feature/modulo-pagos
El Pull Request permitirá revisar los cambios antes de incorporarlos a la rama de integración.
El PR deberá incluir:
•	Título descriptivo de la modificación.
•	Identificación de la tarea relacionada.
•	Explicación del problema o necesidad que se resuelve.
•	Resumen de los archivos y funcionalidades modificados.
•	Pruebas realizadas y sus resultados.
•	Capturas de pantalla cuando existan cambios visuales.
•	Observaciones sobre validaciones, permisos o decisiones técnicas relevantes.
Criterios de cumplimiento:
•	El PR deberá dirigirse a la rama develop, no directamente a main.
•	El autor deberá comprobar que los cambios publicados correspondan a la tarea solicitada.
•	No se solicitará la integración de funcionalidades que presenten errores conocidos sin documentar.
•	El PR permanecerá abierto hasta cumplir las condiciones de revisión y aprobación.
5. Revisión de código (Code Review) y aprobación
Todo Pull Request deberá ser revisado por al menos un integrante distinto de su autor antes de integrarse. La revisión buscará detectar errores, inconsistencias, problemas de seguridad y desviaciones respecto de los requerimientos del sistema.
Responsabilidades:
•	Josué López Álvarez — Product Owner y líder del equipo: verificará que la funcionalidad responda a los requerimientos y criterios de aceptación establecidos. Podrá participar en la revisión técnica cuando corresponda.
•	Jorge Alejandro Montoya Salas — Scrum Master: facilitará el cumplimiento del proceso, dará seguimiento a los bloqueos y promoverá que se respeten las políticas de colaboración.
•	Maximiliano Rodríguez Márquez y Ángel Roberto Ibáñez Chávez — Equipo de desarrollo: participarán en la implementación, revisión cruzada, pruebas y corrección de observaciones, según las tareas asignadas.
La revisión deberá comprobar, según el tipo de cambio:
1.	Cumplimiento de los requerimientos funcionales.
2.	Organización del código conforme a la arquitectura MVC de Laravel.
3.	Validación de datos tanto en el servidor como en la interfaz cuando aplique.
4.	Control de acceso y permisos para proteger la información de alumnos, tutores, calificaciones y pagos.
5.	Manejo adecuado de errores y excepciones.
6.	Ausencia de credenciales, datos personales reales o información sensible en el repositorio.
7.	Pruebas suficientes para verificar el comportamiento esperado.
Política de aprobación: el autor del Pull Request no deberá aprobar sus propios cambios. Las observaciones deberán resolverse antes de la integración. Cuando el cambio afecte reglas de negocio o seguridad, se solicitará una revisión adicional si el equipo lo considera necesario.
6. Integración de cambios en develop
Una vez aprobado el Pull Request, se integrarán los cambios a develop mediante GitHub. Se utilizará una política consistente de combinación para conservar un historial comprensible.
Política propuesta:
•	Integrar únicamente Pull Requests revisados y aprobados.
•	Preferir Squash and merge cuando se busque consolidar los commits de una tarea en un único cambio identificable.
•	Resolver los conflictos antes de integrar y volver a ejecutar las pruebas afectadas.
•	No forzar actualizaciones de ramas compartidas sin coordinación previa.
•	Eliminar la rama de trabajo después de confirmar que la integración fue exitosa.
Después de la integración, el equipo deberá verificar que develop conserve un estado funcional y que los cambios no afecten negativamente otros módulos.
7. Cierre del sprint y publicación de la versión estable
Al finalizar cada sprint, el equipo revisará las funcionalidades terminadas, los resultados de las pruebas y los criterios de aceptación. Solo los cambios integrados y verificados podrán formar parte de una entrega estable.
La rama main representará la versión estable del sistema y no deberá recibir cambios experimentales ni funcionalidades sin revisar.
Procedimiento de cierre:
1.	Revisar las tareas terminadas y pendientes del sprint.
2.	Verificar que las funcionalidades comprometidas cumplan sus criterios de aceptación.
3.	Ejecutar las pruebas de integración y regresión pertinentes.
4.	Revisar que develop se encuentre estable.
5.	Crear un Pull Request de develop hacia main.
6.	Revisar y aprobar la entrega antes de realizar el merge.
7.	Registrar la versión mediante una etiqueta de Git, por ejemplo, v0.1.0.
8.	Documentar las funcionalidades entregadas, los defectos conocidos y las tareas pendientes.
Importante: finalizar un sprint no implica que todas las tareas deban considerarse terminadas. Las funcionalidades que no cumplan los criterios de aceptación permanecerán pendientes y se replanificarán según las prioridades del Product Owner.
2.2.3 Manejo de conflictos y errores
Si dos integrantes modifican los mismos archivos o aparecen conflictos al integrar cambios, se seguirá este procedimiento:
1.	Identificar los archivos afectados y determinar qué cambios entran en conflicto.
2.	Comunicarse con los integrantes involucrados para acordar la solución.
3.	Resolver los conflictos sin eliminar modificaciones válidas de otros compañeros.
4.	Revisar los cambios resultantes y ejecutar las pruebas correspondientes.
5.	Publicar la resolución en la rama de trabajo y actualizar el Pull Request.
6.	Solicitar una nueva revisión si la resolución modifica sustancialmente el código previamente aprobado.
Si se detecta un error después de integrar una funcionalidad, se abrirá una tarea de corrección y se seguirá el mismo flujo de ramas, revisión y pruebas.
2.2.4 Trazabilidad y evidencias
Para demostrar la aplicación del protocolo, el equipo conservará las siguientes evidencias en el repositorio remoto:
Evidencia	Propósito
Historial de commits	Identificar qué cambios se realizaron y cuándo.
Listado de ramas	Comprobar la nomenclatura y separación de tareas.
Pull Requests	Documentar las modificaciones propuestas y su revisión.
Comentarios de revisión	Mostrar observaciones y correcciones realizadas.
Historial de merges	Identificar cuándo se integraron los cambios.
Etiquetas de versión	Reconocer las entregas estables del sistema.
Pruebas y capturas	Respaldar el funcionamiento de las funcionalidades entregadas.
Tablero de tareas	Relacionar responsables, tareas, sprints y resultados.
2.2.5 Justificación técnica
La adopción de este protocolo permite organizar el trabajo colaborativo, reducir el riesgo de sobrescribir código de otros integrantes y mantener un historial verificable de las modificaciones. Asimismo, los Pull Requests facilitan la revisión técnica antes de integrar nuevas funcionalidades, mientras que las pruebas ayudan a detectar errores antes de publicar una versión estable.
Para el Sistema Académico V.1, este control es especialmente importante porque el sistema administrará información escolar y financiera. Por ello, la revisión deberá considerar tanto el funcionamiento de los módulos como la protección de los datos y el control de acceso.
La separación entre develop y main permitirá distinguir la integración continua del trabajo del equipo de las versiones estables que se presenten como entregables. De esta manera, el proceso de desarrollo se mantendrá organizado, documentado y alineado con los objetivos del proyecto.
Nota de implementación: las ramas, políticas de aprobación, permisos y evidencias descritas deberán configurarse y comprobarse en el repositorio real del equipo. Este protocolo establece el procedimiento acordado; su cumplimiento deberá demostrarse mediante la actividad efectiva de Git y GitHub.
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

