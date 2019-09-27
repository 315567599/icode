VOCAB_LISTS = {
    'education': ['Bachelors',
                  'HS-grad',
                  '11th',
                  'Masters',
                  '9th',
                  'Some-college',
                  'Assoc-acdm',
                  'Assoc-voc',
                  '7th-8th',
                  'Doctorate',
                  'Prof-school',
                  '5th-6th',
                  '10th',
                  '1st-4th',
                  'Preschool',
                  '12th'],

    'marital_status': ['Married-civ-spouse',
                       'Divorced',
                       'Married-spouse-absent',
                       'Never-married',
                       'Separated',
                       'Married-AF-spouse',
                       'Widowed'],

    'relationship': ['Husband',
                     'Not-in-family',
                     'Wife',
                     'Own-child',
                     'Unmarried',
                     'Other-relative'],

    'workclass': ['Self-emp-not-inc',
                  'Private',
                  'State-gov',
                  'Federal-gov',
                  'Local-gov',
                  'Self-emp-inc',
                  'Without-pay',
                  'Never-worked'],

    'occupation': ['Tech-support',
                   'Craft-repair',
                   'Other-service',
                   'Sales',
                   'Exec-managerial',
                   'Prof-specialty',
                   'Handlers-cleaners',
                   'Machine-op-inspct',
                   'Adm-clerical',
                   'Farming-fishing',
                   'Transport-moving',
                   'Priv-house-serv',
                   'Protective-serv',
                   'Armed-Forces']
}

for field,featnames in VOCAB_LISTS.items():
    print(field)

VOCAB_MAPPINGS = {field: {featname: idx for idx, featname in enumerate(featnames)} for field, featnames in
                  VOCAB_LISTS.items()}
print(VOCAB_MAPPINGS)
