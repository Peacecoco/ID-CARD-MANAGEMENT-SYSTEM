# ID Card Management and Printing System

## Setup

1. Install dependencies:
   ```
   composer install
   ```
2. Create the database:
   ```
   mysql -u root -p < schema.sql
   ```
3. Edit `config.php` with your real DB credentials and confirm
   `CARD_WIDTH_MM` / `CARD_HEIGHT_MM` match the actual card stock.
4. Place logos referenced in the `colleges` table under
   `/assets/logos/` (path is stored per college, adjust as needed).
5. Upload student photos to `uploads/photos/`, with `photo_path`
   set on each student row.

## Generating a batch

```
php generate_batch.php <college_id>
```

This will:
1. Pre-process any student photos for that college that haven't
   been processed yet (resize to print size, normalize brightness,
   compress).
2. Render every active student's front and back card pages into
   one PDF, written incrementally rather than merged afterward.
3. Record the batch in `id_card_batches` and log a per-student
   result in `id_card_batch_items`, so one bad record doesn't
   fail the whole run and you have an audit trail of what was
   printed and when.

## Folder structure

```
/templates
    /front       shared_front.php - ONE layout for every college,
                 themed via colleges.primary_color (blue/yellow/green/etc).
                 Drop a file named {template_key}.php here only if a
                 specific college ever needs a genuinely different layout;
                 Renderer.php picks it up automatically over the shared one.
    /back        shared_back.php - identical for every college
    /partials    header_logo.php, footer.php - shared, themed via
                 colleges.primary_color and colleges.footer_text
/lib
    Database.php
    PhotoProcessor.php
    Renderer.php
/output          generated batch PDFs land here
/uploads
    /photos            raw uploaded photos
    /photos_processed  resized/normalized/compressed photos
```

## Design notes worth remembering

- **Back-of-card template is deliberately pure black/white**, no
  color values anywhere. This is intentional: if the ribbon in use
  is YMCKOK (has a dedicated second black panel), a genuinely
  monochrome back side can print on the K-only panel instead of
  a full color pass. Do not add any color styling to
  `templates/back/shared_back.php`.

- **Front layout is fully shared** (`templates/front/shared_front.php`).
  Only `primary_color` (and `footer_text`) differ per college. Adding
  a new college is a single row insert, no new file. If a college's
  layout ever genuinely diverges, add `templates/front/{template_key}.php`
  and it overrides the shared template automatically for that college
  only, nothing else changes.

- **Photo pre-processing is a separate step from PDF generation**
  on purpose. A corrupted or missing photo fails that one student
  and gets logged, it does not abort the batch.

- **Front/back pages are interleaved per student** (front, back,
  front, back...) in the output PDF. Confirm this page order
  matches what the Magicard 300's duplex driver expects before
  running a full production batch, some duplex drivers expect
  all fronts then all backs instead.

## Not yet included (next steps)

- Admin web UI for triggering a batch generation instead of CLI.
- Photo upload handling/validation endpoint.
- Barcode/QR code generation on the front or back.
- Reprint workflow for individual students without regenerating
  the whole college batch.
