--
-- PostgreSQL database dump
--

-- Dumped from database version 17.4 (Debian 17.4-1.pgdg120+2)
-- Dumped by pg_dump version 17.4

-- Started on 2025-03-04 12:03:37 UTC

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 5 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: root
--

--CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO root;

--
-- TOC entry 3365 (class 0 OID 0)
-- Dependencies: 5
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: root
--

COMMENT ON SCHEMA public IS 'standard public schema';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 217 (class 1259 OID 16385)
-- Name: assignments; Type: TABLE; Schema: public; Owner: root
--

CREATE TABLE public.assignments (
    value1 text,
    value2 text
);


ALTER TABLE public.assignments OWNER TO root;

--
-- TOC entry 218 (class 1259 OID 16390)
-- Name: courses; Type: TABLE; Schema: public; Owner: root
--

CREATE TABLE public.courses (
    coursename text,
    courseid oid
);


ALTER TABLE public.courses OWNER TO root;

--
-- TOC entry 3358 (class 0 OID 16385)
-- Dependencies: 217
-- Data for Name: assignments; Type: TABLE DATA; Schema: public; Owner: root
--

COPY public.assignments (value1, value2) FROM stdin;
\.


--
-- TOC entry 3359 (class 0 OID 16390)
-- Dependencies: 218
-- Data for Name: courses; Type: TABLE DATA; Schema: public; Owner: root
--

COPY public.courses (coursename, courseid) FROM stdin;
Astra2 1	\N
Astra3 2	\N
Astralinux Users 3	\N
Astralinux Admin 4	\N
RedOS Users 5	\N
ROSA Linux Users 6	\N
Basealt 7	\N
KasperskyOS Users 8	\N
KasperskyOS Admin 9	\N
Solaris Users 10	\N
\.


--
-- TOC entry 3366 (class 0 OID 0)
-- Dependencies: 5
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: root
--

REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2025-03-04 12:03:37 UTC

--
-- PostgreSQL database dump complete
--

