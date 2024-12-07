### Database Setup

1. Make sure PostgreSQL is installed on your system.
2. Run the following command to create the database schema:

   ```bash
   psql -U <username> -d <database_name> -f db/schema.sql
