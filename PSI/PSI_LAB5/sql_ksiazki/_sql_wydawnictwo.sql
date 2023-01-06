-- Table: ksiazki.wydawnictwo

-- DROP TABLE ksiazki.wydawnictwo;

CREATE SEQUENCE ksiazki.wydawnictwo_id_seq;
CREATE TABLE ksiazki.wydawnictwo
(
    id bigint NOT NULL DEFAULT nextval('ksiazki.wydawnictwo_id_seq'::regclass),
    nazwa character varying(50) NOT NULL,
    adres character varying,
    CONSTRAINT wydawnictwo_pkey PRIMARY KEY (id)
)
WITH (OIDS = FALSE)
TABLESPACE pg_default;

ALTER SEQUENCE ksiazki.wydawnictwo_id_seq OWNED BY ksiazki.wydawnictwo.id;


