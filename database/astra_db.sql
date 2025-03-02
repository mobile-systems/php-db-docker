--
-- PostgreSQL database dump
--

-- Dumped from database version 11.22 (Debian 1:11.22-astra.se1+ci1)
-- Dumped by pg_dump version 16.6

-- Started on 2025-03-01 20:52:40

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET escape_string_warning = off;
SET row_security = off;

--
-- TOC entry 6 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: root
--

--CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO root;

--
-- TOC entry 2934 (class 0 OID 0)
-- Dependencies: 6
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: root
--

COMMENT ON SCHEMA public IS 'standard public schema';


SET default_tablespace = '';

--
-- TOC entry 197 (class 1259 OID 24582)
-- Name: assignments; Type: TABLE; Schema: public; Owner: root
--

CREATE TABLE public.assignments (
    value1 text,
    value2 text
);


ALTER TABLE public.assignments OWNER TO root;

--
-- TOC entry 196 (class 1259 OID 24576)
-- Name: courses; Type: TABLE; Schema: public; Owner: root
--

CREATE TABLE public.courses (
    coursename text,
    courseid oid
);


ALTER TABLE public.courses OWNER TO root;

--
-- TOC entry 2928 (class 0 OID 24582)
-- Dependencies: 197
-- Data for Name: assignments; Type: TABLE DATA; Schema: public; Owner: root
--

COPY public.assignments (value1, value2) FROM stdin;
\.


--
-- TOC entry 2927 (class 0 OID 24576)
-- Dependencies: 196
-- Data for Name: courses; Type: TABLE DATA; Schema: public; Owner: root
--

COPY public.courses (coursename, courseid) FROM stdin;
Astra2 1	\N
Astra3 2	\N
Astralinux Users 3	\N
Astralinux Admin 4	\N
Test 5	\N
\.


--
-- TOC entry 2935 (class 0 OID 0)
-- Dependencies: 6
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: root
--

REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2025-03-01 20:52:40

--
-- PostgreSQL database dump complete
--

