ALTER TABLE "#__session" ALTER COLUMN "client_id" DROP NOT NULL;
ALTER TABLE "#__session" ALTER COLUMN "client_id" SET DEFAULT NULL;
