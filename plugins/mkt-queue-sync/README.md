# Mikrotik Queue Sync

Plugin para sincronizar velocidades configuradas en planes de servicios de UCRM a colas simples en Mikrotik.
Plugin to do traffic shaping in Mikrotik, synchronizing UCRM service plan speed with simple queues.

## ¿Como funciona?
* Descargar e instalar el plugin. / Download and install de plugin
* Configurar el plugin / Config the plugin

## Configuraciones a realizar / Configurations to do
## Ajustes de Plugin

| Item | Descripción | Description |
| ----------- | ------------- | ------------- |
| Mikrotik IP Address | Direccion IP del router Mikrotik  | IP address of the Mikrotik router |
| API PORT | Solo es necesario en caso de que el Puerto API sea diferente a 8728  | Only needed when Api port is different than 8728 |
| Mikrotik Username | Usuario del router Mikrotik  | Mikrotik router username |
| Mikrotik Password | Contrseña del router Mikrotik  | Mikrotik router password |
| Burst Limit Percentage | Porcentaje para calcular el Burst-Limit sobre el Max-Limit de cada Plan (Valores Validos 0 a 100)*  | Percentage used to calc the Burst-Limit over the Max-Limit of each plan (Valid Values 0 to 100)* |
| Burst Time | Tiempo de burst utilizado en cada cola (Valores Validos 1 a 99)* | Burst time used in each queue (Valid values 1 to 99)* |
| Limit At % | Porcentaje para calcular el Limit-At sobre el Max-Limit de cada Plan (Valores Validos 1 a 99)*  | Percentage used to calc the Limit-At over the Max-Limit of each plan (Valid Values 1 to 99)* |
| Add Queue? | Si esta seteado se agregaran las colas al Mikrotik en caso de que las mismas no existan | If set the queues will be added to Mikrotik if they don't exist |
| UNMS API Token | Solo necesario si se utiliza UNMS V1 o superior** | Only needed when running UNMS V1 or later** |

* Los valores Burst Limit Percentage, Burst Time y Limit At %, deben ser cargados en formato UU/DD (Siendo UU el valor correspondiendo a Upload y DD el correspondiente a Download)
Por ejemplo para limit At 20% de Subida y 50% de Bajada, la configuracion seria: 20/50

* The values settings for Burst Limit Percentage, Burst Time y Limit At %, should be set in format UU/DD (Where UU is the Upload value and DD is Download)
For example for a limit-At 20% for upload and 50% for download, setting should be: 20/50

** This version handles multiple devices / Esta version puede manejar multiples dispositivos:
* Para hacer una sincronizacion selectiva (IP xxx sincronizar con Mikrotik yyy) se debe generar un address list llamado sync_with_ucrm, conteniendo todas las ip's o rangos de IP que se desean sincronizar con este equipo.
* To do a selective sync (IP xxx sync with Mikrotik yyy) you must create an address-list called sync_with_ucrm, which should contain the ip's or ip ranges to sync with that Mikrotik

* This version could be automatically executed by webhooks, you should create a webhook with url: http://localhost/crm/_plugins/mkt-queue-sync/public.php and Webhook event type: service.edit
* Esta version es compatible con ejecucion automatica a traves de webhooks, se debe crear un webhook con url: http://localhost/crm/_plugins/mkt-queue-sync/public.php y tipo de eventos webhook: service.edit

** Existe una version PRO del complemento disponible a demanda, la cual maneja suspension, eliminacion automatica de colas/address-list relacionadas a servicios finalizados y creacion de address-list relacionadas a los planes de servicios (Solo contactame!!)
** A PRO version of the plugin is available on demand which handles Suspend feature for multiple devices, autoremove feature to remove queues/address-list for terminated services and creation of address-list with service-plans. (Just contact me!!)

** Al usar UNMS V1 o superior, se debe de crear una clave API en UNMS -> Settings -> Users, esta clave API debera ser cargada en la configuracion del plugin.
Tambien debe ser cargada su rango de red en la seccion Network del UNMS.

** When using UNMS V1 or later, it's necesary to creat an API password in UNMS -> Settings -> Users, and this passwords should be set in the plugin config.
Also your network should be loaded in the UNMS Network section.

***Si te gusto mi trabajo o te ha sido de utilidad y crees que me merezco un cafe https://www.paypal.me/fgampel*** 

***If you like the script or it helped you out and you think I deserve a coffee https://www.paypal.me/fgampel***

[Mikrotik Queue Wiki](https://wiki.mikrotik.com/wiki/Manual:Queue)
