<?php

$leader = $bdd->query('SELECT * FROM team WHERE grade = "Leader"');

$chef = $bdd->query('SELECT * FROM team WHERE grade Like ("Chef%") OR ("Cheffe%")');

$sous_chef = $bdd->query('SELECT * FROM team WHERE grade Like ("Sous-chef%") OR ("Sous-cheffe%")');

$trad = $bdd->query('SELECT * FROM team WHERE role Like("%trad%")');

$check = $bdd->query('SELECT * FROM team WHERE role Like("%check%")');

$clean = $bdd->query('SELECT * FROM team WHERE role Like("%clean%")');

$edit = $bdd->query('SELECT * FROM team WHERE role Like("%edit%")');

$coloriste = $bdd->query('SELECT * FROM team WHERE role Like("%coloriste%")');

$dev = $bdd->query('SELECT * FROM team WHERE grade = "Développeur"');