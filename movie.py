import os
import sys
from langchain.chains.api.prompt import API_RESPONSE_PROMPT
from langchain.chains import APIChain
from langchain.prompts.prompt import PromptTemplate
from langchain.prompts import PromptTemplate
from langchain.llms import OpenAI
from langchain.chains.api import tmdb_docs
from langchain.chains import LLMChain

def call(movie_name):
    
    os.environ["OPENAI_API_KEY"] = "OPENAI_API_KEY"
    os.environ["TMDB_BEARER_TOKEN"] = "TMDB_BEARER_TOKEN"

    llm = OpenAI(temperature=0, max_tokens = -1)

    #print("안녕하세요!")
    #print("저는 영화의 평점과 요약을 알려주는 시스템입니다.\n")
    #print("")
    
    try:
        prompt = PromptTemplate(
            input_variables=["movie"],
            template="{movie}의 평점과 overview를 한글로 요약해서 알려줘",
        )

        chain = LLMChain(llm=llm, prompt=prompt)
        movie_prompt = prompt.format(movie=movie_name)

        headers = {"Authorization": f"Bearer {os.environ['TMDB_BEARER_TOKEN']}"}
        chain = APIChain.from_llm_and_api_docs(llm, tmdb_docs.TMDB_DOCS, headers=headers, verbose=False)
        output = chain.run(movie_prompt)
        #print(">>", end='')
        print(output)

    except:
        print("토큰을 모두 사용하여 요약이 불가능합니다.")

call(sys.argv[1])
