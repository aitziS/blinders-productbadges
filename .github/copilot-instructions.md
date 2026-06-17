# Instrucciones para GitHub Copilot — proyecto productbadges

Este repo contiene un módulo para PrestaShop 1.7.8.x (PHP 7.4/8.1).

## Convenciones
- Sigue el patrón de PrestaShop: ObjectModel para datos, HelperForm/HelperList para backoffice.
- Toda entrada de usuario se valida en servidor, nunca solo en cliente.
- Usa pSQL() o Db::getInstance() con consultas preparadas, nunca concatenar SQL directo.
- Los textos van con $this->l(), nunca strings hardcodeadas.
- La lógica de backoffice va en controllers/admin/AdminProductBadgesController.php, no en productbadges.php.
- Cast explícito a (int) en todos los IDs.

## Contexto del proyecto
Módulo de etiquetas visuales (badges) para productos: CRUD de etiquetas, asignación N:M a productos, visualización en frontend, multilenguaje (es/en) y compatibilidad multitienda.