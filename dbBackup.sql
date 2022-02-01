--
-- PostgreSQL database dump
--

-- Dumped from database version 13.5 (Ubuntu 13.5-2.pgdg20.04+1)
-- Dumped by pg_dump version 14.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Data for Name: activity; Type: TABLE DATA; Schema: public; Owner: ipzjrrmkyjyrrz
--

COPY public.activity (id_activity, level) FROM stdin;
1	lightly active
2	moderately active
3	very active
\.


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: ipzjrrmkyjyrrz
--

COPY public.categories (id_category, name) FROM stdin;
1	lunch
2	plain
3	breakfast
\.


--
-- Data for Name: diet_type; Type: TABLE DATA; Schema: public; Owner: ipzjrrmkyjyrrz
--

COPY public.diet_type (id_diet_type, type) FROM stdin;
1	cut
2	bulk
3	maintain
\.


--
-- Data for Name: role; Type: TABLE DATA; Schema: public; Owner: ipzjrrmkyjyrrz
--

COPY public.role (id_role, role) FROM stdin;
1	user
2	administrator
3	reviewer
\.


--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: ipzjrrmkyjyrrz
--

COPY public."user" (id_user, id_role, name, email, password, verified, image) FROM stdin;
42	1	Mariusz	mariusz@email.com	$2y$10$ac0LEZkvvDcgJPtEJguxHeMOWADJP/d1OPT.ZKIoUMXMTBIIHONzq	f	defaultUserPicture.png
1	1	Unknown	unknown	unknown	f	defaultUserPicture.png
\.


--
-- Data for Name: favourites; Type: TABLE DATA; Schema: public; Owner: ipzjrrmkyjyrrz
--

COPY public.favourites (id_favourites, id_user, name) FROM stdin;
\.


--
-- Data for Name: order; Type: TABLE DATA; Schema: public; Owner: ipzjrrmkyjyrrz
--

COPY public."order" (id_order, id_user, date_order_placed, confirmed) FROM stdin;
1	42	2022-01-15 15:22:11.655835	f
\.


--
-- Data for Name: favourites_order; Type: TABLE DATA; Schema: public; Owner: ipzjrrmkyjyrrz
--

COPY public.favourites_order (id_favourites, id_order) FROM stdin;
\.


--
-- Data for Name: gender; Type: TABLE DATA; Schema: public; Owner: ipzjrrmkyjyrrz
--

COPY public.gender (id_gender, gender) FROM stdin;
1	male
2	female
\.


--
-- Data for Name: information; Type: TABLE DATA; Schema: public; Owner: ipzjrrmkyjyrrz
--

COPY public.information (id_information, id_user, weight, id_gender, age, id_activity_work, id_activity_post_work, id_diet_type, additional_calories) FROM stdin;
11	1	50	1	18	1	1	3	0
10	42	83	1	21	1	2	3	0
\.


--
-- Data for Name: ingredient; Type: TABLE DATA; Schema: public; Owner: ipzjrrmkyjyrrz
--

COPY public.ingredient (id_ingredient, name, kcal, protein, carbohydrates, fats, fiber) FROM stdin;
1	chicken breast	164	31	0	3.6	0
2	white rice	358	6.5	79	0.5	1.2
3	wheat flour	364	10	76	1	2.7
4	eggs	155	13	1.1	11	0
\.


--
-- Data for Name: shop; Type: TABLE DATA; Schema: public; Owner: ipzjrrmkyjyrrz
--

COPY public.shop (id_shop, name, id_address) FROM stdin;
\.


--
-- Data for Name: product; Type: TABLE DATA; Schema: public; Owner: ipzjrrmkyjyrrz
--

COPY public.product (id_product, id_shop, weight) FROM stdin;
\.


--
-- Data for Name: ingredient_product; Type: TABLE DATA; Schema: public; Owner: ipzjrrmkyjyrrz
--

COPY public.ingredient_product (id_ingredient, id_product) FROM stdin;
\.


--
-- Data for Name: logs; Type: TABLE DATA; Schema: public; Owner: ipzjrrmkyjyrrz
--

COPY public.logs (id_logs, id_user, action, host, device, "timestamp") FROM stdin;
1	42	Delete on order_meal	172.19.0.1	\N	2022-01-27 14:40:49.171889
2	42	Insert on order_meal	172.19.0.1	\N	2022-01-27 14:40:50.549529
3	42	Insert on order_meal	172.19.0.1	\N	2022-01-27 14:40:51.446152
4	42	Insert on order_meal	172.19.0.1	\N	2022-01-27 14:40:52.34969
5	42	Insert on order_meal	172.19.0.1	\N	2022-01-27 14:40:53.730803
6	42	Insert on order_meal	172.19.0.1	\N	2022-01-27 14:40:54.647898
7	42	Insert on order_meal	172.19.0.1	\N	2022-01-27 14:40:55.961509
8	42	Insert on order_meal	172.19.0.1	\N	2022-01-27 14:40:56.832964
9	42	Insert on order_meal	172.19.0.1	\N	2022-01-27 14:40:57.730202
10	42	Update on information	172.19.0.1	\N	2022-02-01 17:14:20.804496
11	42	Update on user_diet_info	172.19.0.1	\N	2022-02-01 17:14:21.717081
12	42	Update on user_diet_info	172.19.0.1	\N	2022-02-01 17:14:23.115689
13	42	Delete on order_meal	172.19.0.1	\N	2022-02-01 17:14:48.633915
14	42	Insert on order_meal	172.19.0.1	\N	2022-02-01 17:14:50.018103
15	42	Insert on order_meal	172.19.0.1	\N	2022-02-01 17:14:50.967789
16	42	Insert on order_meal	172.19.0.1	\N	2022-02-01 17:14:51.912437
17	42	Insert on order_meal	172.19.0.1	\N	2022-02-01 17:14:53.29987
18	42	Insert on order_meal	172.19.0.1	\N	2022-02-01 17:14:54.210858
19	42	Insert on order_meal	172.19.0.1	\N	2022-02-01 17:14:55.597312
20	42	Insert on order_meal	172.19.0.1	\N	2022-02-01 17:14:56.467407
21	42	Insert on order_meal	172.19.0.1	\N	2022-02-01 17:14:57.368936
\.


--
-- Data for Name: meal; Type: TABLE DATA; Schema: public; Owner: ipzjrrmkyjyrrz
--

COPY public.meal (id_meal, id_author, title, time_to_prep, recipe, description, image) FROM stdin;
4	\N	Chicken with rice	25	Do this and that. Then do that. In the end that.	Plain and simple, high in protein.	chicken.jpg
5	\N	Pancakes 	20	Do this. Then that. Then enjoy fluffy pancakes.	Nice, sweet and easy.	pancakes.jpg
\.


--
-- Data for Name: meal_categories; Type: TABLE DATA; Schema: public; Owner: ipzjrrmkyjyrrz
--

COPY public.meal_categories (id_meal, id_categories) FROM stdin;
4	1
4	2
5	3
\.


--
-- Data for Name: meal_ingredient; Type: TABLE DATA; Schema: public; Owner: ipzjrrmkyjyrrz
--

COPY public.meal_ingredient (id_meal, id_ingredient, weight) FROM stdin;
4	1	3
4	2	1
5	3	3
5	4	2
\.


--
-- Data for Name: order_meal; Type: TABLE DATA; Schema: public; Owner: ipzjrrmkyjyrrz
--

COPY public.order_meal (id_order, id_meal, multiplier, day) FROM stdin;
1	5	1	1
1	5	1	1
1	4	1	1
1	5	1	2
1	4	1	2
1	4	1	3
1	4	1	3
1	5	1	3
\.


--
-- Data for Name: review; Type: TABLE DATA; Schema: public; Owner: ipzjrrmkyjyrrz
--

COPY public.review (id_meal, id_user, content, datetime, grade) FROM stdin;
\.


--
-- Data for Name: user_diet_info; Type: TABLE DATA; Schema: public; Owner: ipzjrrmkyjyrrz
--

COPY public.user_diet_info (id_user_diet_info, id_user, tdee, protein_ratio, carbs_ratio, fat_ratio) FROM stdin;
5	1	2500	25	55	20
4	42	2912	25	55	20
\.


--
-- Name: activity_id_activity_seq; Type: SEQUENCE SET; Schema: public; Owner: ipzjrrmkyjyrrz
--

SELECT pg_catalog.setval('public.activity_id_activity_seq', 1, false);


--
-- Name: categories_id_category_seq; Type: SEQUENCE SET; Schema: public; Owner: ipzjrrmkyjyrrz
--

SELECT pg_catalog.setval('public.categories_id_category_seq', 1, true);


--
-- Name: diet_type_id_diet_type_seq; Type: SEQUENCE SET; Schema: public; Owner: ipzjrrmkyjyrrz
--

SELECT pg_catalog.setval('public.diet_type_id_diet_type_seq', 1, false);


--
-- Name: favourites_id_favourites_seq; Type: SEQUENCE SET; Schema: public; Owner: ipzjrrmkyjyrrz
--

SELECT pg_catalog.setval('public.favourites_id_favourites_seq', 1, false);


--
-- Name: gender_id_gender_seq; Type: SEQUENCE SET; Schema: public; Owner: ipzjrrmkyjyrrz
--

SELECT pg_catalog.setval('public.gender_id_gender_seq', 1, true);


--
-- Name: information_id_information_seq; Type: SEQUENCE SET; Schema: public; Owner: ipzjrrmkyjyrrz
--

SELECT pg_catalog.setval('public.information_id_information_seq', 11, true);


--
-- Name: ingridient_id_ingridient_seq; Type: SEQUENCE SET; Schema: public; Owner: ipzjrrmkyjyrrz
--

SELECT pg_catalog.setval('public.ingridient_id_ingridient_seq', 1, false);


--
-- Name: logs_id_logs_seq; Type: SEQUENCE SET; Schema: public; Owner: ipzjrrmkyjyrrz
--

SELECT pg_catalog.setval('public.logs_id_logs_seq', 21, true);


--
-- Name: meal_id_meal_seq; Type: SEQUENCE SET; Schema: public; Owner: ipzjrrmkyjyrrz
--

SELECT pg_catalog.setval('public.meal_id_meal_seq', 23, true);


--
-- Name: order_id_order_seq; Type: SEQUENCE SET; Schema: public; Owner: ipzjrrmkyjyrrz
--

SELECT pg_catalog.setval('public.order_id_order_seq', 1, true);


--
-- Name: product_id_product_seq; Type: SEQUENCE SET; Schema: public; Owner: ipzjrrmkyjyrrz
--

SELECT pg_catalog.setval('public.product_id_product_seq', 1, false);


--
-- Name: role_id_role_seq; Type: SEQUENCE SET; Schema: public; Owner: ipzjrrmkyjyrrz
--

SELECT pg_catalog.setval('public.role_id_role_seq', 1, false);


--
-- Name: shop_id_shop_seq; Type: SEQUENCE SET; Schema: public; Owner: ipzjrrmkyjyrrz
--

SELECT pg_catalog.setval('public.shop_id_shop_seq', 1, false);


--
-- Name: user_diet_info_id_user_diet_info_seq; Type: SEQUENCE SET; Schema: public; Owner: ipzjrrmkyjyrrz
--

SELECT pg_catalog.setval('public.user_diet_info_id_user_diet_info_seq', 5, true);


--
-- Name: user_id_user_seq; Type: SEQUENCE SET; Schema: public; Owner: ipzjrrmkyjyrrz
--

SELECT pg_catalog.setval('public.user_id_user_seq', 42, true);


--
-- PostgreSQL database dump complete
--

